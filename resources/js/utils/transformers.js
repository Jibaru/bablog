/**
 * Transformers
 * Created at 15/02/2020 22:28
 * Created by Ignacio Rueda
 * Updated at 15/02/2020 22:28
 * Updated by Ignacio Rueda
 *
 * Multiple methods to handle objects.
 */

export default {
    isObject(o) {
        return o === Object(o) && !this.isArray(o) && typeof o !== 'function';
    },

    isArray(a) {
        return Array.isArray(a);
    },

    toCamel(s){
        return s.replace(/([-_][a-z])/ig, ($1) => {
            return $1.toUpperCase()
                .replace('-', '')
                .replace('_', '');
        });
    },

    keysToCamel (o) {
        if (this.isObject(o)) {
            const n = {};

            Object.keys(o)
                .forEach((k) => {
                    n[this.toCamel(k)] = this.keysToCamel(o[k]);
                });

            return n;
        } else if (this.isArray(o)) {
            return o.map((i) => {
                return this.keysToCamel(i);
            });
        }

        return o;
    },

    looper(times, callback){
        const looper = [...Array(times)].map(Math.random);
        looper.forEach(callback);
    },

    massiveAssignment(from, to){
        if (this.isObject(from)) {

            Object.keys(from)
                .forEach((k) => {
                    if(!this.isObject(from[k])){
                        to[k] = from[k];
                    } else {
                        console.log(from[k], to[k], 'as');
                        this.massiveAssignment(from[k], to[k]);
                    }
                });

        } else if (this.isArray(from)) {
            to = from;
        }
    }
}
