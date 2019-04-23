import AppForm from '../app-components/Form/AppForm';

Vue.component('menu-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                company_id:  '' ,
                type:  '' ,
                name:  '' ,
                price:  '' ,
                category:  '' ,
                
            }
        }
    }

});