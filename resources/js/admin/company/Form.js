import AppForm from '../app-components/Form/AppForm';

Vue.component('company-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                mobile:  '' ,
                address:  '' ,
                type:  '' ,
                rating:  '' ,
                
            }
        }
    }

});