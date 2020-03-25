<template>
    <div class="modal fade"
         :id="id"
         tabindex="-1"
         role="dialog"
         :aria-labelledby="`modal-${id}-title`"
         aria-hidden="true">
        <div :class="`modal-dialog ${customClasses}`"
             role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        :id="`modal-${id}-title`">{{title}}</h5>
                    <button type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <slot name="modal-body"></slot>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

    export default {
        props: {
            id: {
                type: Number | String,
                default: undefined
            },
            title: {
                type: String,
                default: 'Título'
            },
            customClasses: {
                type: String,
                default: ''
            }
        },
        methods: {
            show(){
                $(`#${this.id}`).modal('show');
            },
            hide(){
                $(`#${this.id}`).modal('hide');
            },
        }
    }

</script>

<style>

    .post-modal {
        max-width: 75%;
    }

    @media only screen and (max-width: 767px) {
        .post-modal {
            max-width: 100%;
        }
    }
</style>
