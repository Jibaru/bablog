<template>
    <div :id="`multiselect-${label}`">
        <label >{{ label }}</label>
        <multiselect
            v-model="$attrs.value"
            :options="options"
            :label="propertyName"
            :track-by="propertyName"
            :show-labels="false"
            selectedLabel=" "
            :multiple="true"
            :limit="limit"
            :max="limit"
            :taggable="true"
            :option-height="46"
            :allow-empty="true"
            @input="sendSelectedOptions"
            :placeholder="placeholder">
            <template slot="singleLabel" slot-scope="{ option }"><strong>{{ option[propertyName] }}</strong>
            </template>
            <div slot="noResult">
                <p><strong>Elementos no encontrados</strong></p>
            </div>
            <div slot="maxElements" >
                <p><strong>El número máximo de elementos es {{limit}}. Remueva un elemento seleccionado para ingresar otro.</strong></p>
            </div>
        </multiselect>


    </div>

</template>

<script>
    import {Multiselect} from 'vue-multiselect';

    export default {
        props: {
            label: {
                type: String,
                required: true
            },
            placeholder: {
                type: String
            },
            urlService: {
                type: String
            },
            useService: {
                type: Boolean,
                default: false
            },
            colSize: {
                type: Number,
                default: 12
            },
            propertyName: {
                type: String,
                default: 'name'
            },
            limit: {
                type: Number,
                default: 1
            },
            singleValueAsObject: {
                type: Boolean,
                default: true
            },
            fieldValue:{
                type: Function,
                default: (value) => { return value['name']; }
            },
            optionList: {
                type: Array
            },
            required: {
                type: Boolean,
                default: false
            },
        },
        components: {
            multiselect: Multiselect
        },
        data(){
            return {
                nameComponent: 'Combo General 2',
                options: [],
                hasItems: ''
            }
        },
        methods: {
            loadData(){
                this.options = [];
                if(this.useService === true){
                    axios.get(this.urlService)
                        .then( resp => {
                            const values = resp.data;
                            values.forEach(value => {
                                const option = {};
                                //option[this.propertyName] = value[this.propertyName];
                                option[this.propertyName] = this.fieldValue(value);
                                option.id   = value.id;
                                this.options.push(option);
                            });
                        })
                        .catch( error => {
                            console.log(error);
                        })
                } else {
                    this.optionList.forEach(value => {
                        const option = {};
                        //option[this.propertyName] = value[this.propertyName];
                        option[this.propertyName] = this.fieldValue(value);
                        option.id   = value.id;
                        this.options.push(option);
                    });
                }
            },
            sendSelectedOptions(value){
                console.log(value);
                if(value !== null){
                    if(this.singleValueAsObject){
                        if(value.length <= 1){
                            this.$emit('input', value[0]);
                            this.$emit('select', value[0]);
                            this.unsetRequired();
                        } else {
                            this.$emit('input', value);
                            this.$emit('select', value);
                            this.unsetRequired();
                        }
                    } else {
                        this.$emit('input', value);
                        this.$emit('select', value);
                        this.unsetRequired();
                    }
                }
                if(value.length === 0){
                    this.setRequired();
                }
            },
            setRequired(){
                if(this.required){
                    $(`#multiselect-${this.label} .multiselect__input`).prop('required', true);
                }
            },
            unsetRequired(){
                if(this.required){
                    $(`#multiselect-${this.label} .multiselect__input`).prop('required', false);
                }
            }
        },
        computed: {
            valueModified(){
                return this.$attrs.value;
            }
        },
        watch: {
            valueModified(){
                if(Array.isArray(this.valueModified)){
                    if(this.valueModified.length > 0){
                        this.unsetRequired();
                    }
                } else {
                    if(this.valueModified !== undefined && this.valueModified !== null){
                        this.unsetRequired();
                    }
                }
            },
            optionList(){
                this.loadData();
            }
        },
        mounted(){
            this.loadData();
            this.setRequired();
        }
    }

</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
