import Vue from 'vue';

import FileInput from './FileInput.vue';
import PasswordGenerator from './PasswordGenerator.vue';
import Collection from './Collection.vue';

new Vue({
    el: '#app',
    components: {
        FileInput,
        PasswordGenerator,
        Collection
    }
});

