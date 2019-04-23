import AppForm from '../app-components/Form/AppForm';

Vue.component('user-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                email:  '' ,
                email_verified_at:  '' ,
                mobile:  '' ,
                description:  '' ,
                service_type:  '' ,
                address:  '' ,
                rating:  '' ,
                
            },

            mediaCollections: ['user_img', 'secret_file']
        }
    }

});