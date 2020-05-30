import Component from './Component'

let Plugin = {
    install: function (Vue, options = {}) {
        Vue.component('modal', Component)

        Plugin.events = new Vue();

        Vue.prototype.$modal = {
            show(name, params = {}) {
                location.hash = name

                Plugin.events.$emit('show', params)
            },

            hide(name) {
                location.hash = '#'
            },

            dialog(message, params = {}) {
                if(typeof message === 'String') {
                    params.message = message
                } else {
                    params = message
                }

                return new Promise((resolve, reject) => {
                    this.show('dialog', params)

                    Plugin.events.$on('selection',  confirmed => resolve(confirmed))
                })
            }
        }
    }
}

export default Plugin;