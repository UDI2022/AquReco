<template>
    <AdHeader />
    <div id="adcontact">
        <div>
            <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Inquiry</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="contact in contactData" :key="contact.contact_id">
                    <td>
                        <template v-if="editMode === contact.contact_id">
                            <input v-model="editedContact.contact_id" />
                        </template>
                        <template v-else>
                             {{ contact.contact_id }}
                        </template>
                    </td>
                    <td>
                        <template v-if="editMode === contact.name">
                            <input v-model="editedContact.name" />
                        </template>
                        <template v-else>
                             {{ contact.name }}
                        </template>
                    </td>
                    <td>
                        <template v-if="editMode === contact.email">
                            <input v-model="editedContact.email" />
                        </template>
                        <template v-else>
                             {{ contact.email }}
                        </template>
                    </td>
                    <td>
                        <template v-if="editMode === contact.inquiry">
                            <input v-model="editedContact.inquiry" />
                        </template>
                        <template v-else>
                             {{ contact.inquiry }}
                        </template>
                        
                    </td>
                <td>
                    <button @click="editContact(contact)">Edit</button>
                    <button @click="deleteContact(contact.contact_id)">Delete</button>
                </td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { usePage } from '@inertiajs/inertia-vue3';

export default {
    data(){
        return {
            contactData:[],
            editMode: null,
            editedContactIndex: null,
            editedContact: {},
        };
    },
    methods: {
        async getContact(){
            try{
                const response = await axios.get("/api/adcontacts");
                this.contactData = response.data
                console.log("contactData:", this.contactData);
            } catch (error){
                console.error(error);
                this.contactData = [];
            }
        },
        async deleteContact(contact) {
            try {
                // サーバー側に削除処理を送信する処理
                // 例えば、axios.delete()を使用するなど
                console.log("Delete contact:", contact);
            } catch (error) {
                console.error(error);
            }
            },
    },
    async mounted() {
        await this.getContact();
    },
};
</script>
<style>
    #adcontact {
        margin:0 5% 0 5%;
        font-size: 2vw;
    }
    button {
        border: 1px solid;
        margin: 1%;
        background-color: #F0FFFF;

    }
</style>