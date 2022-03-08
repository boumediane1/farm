<template>
    <app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form-section @submit.prevent="submit">
                    <template #title>
                        Sidebar
                    </template>
                    <template #form>

                        <div class="col-span-3">
                            <jet-label value="Ouvrier" for="user"></jet-label>
                            <select class="mt-2 py-3 px-4 block w-full text-gray-700 border-gray-200 focus:border-green-500 focus:ring-green-500 rounded-md leading-tight" id="user">
                                <option v-for="user in users" :key="user" :value="user.id" v-text="user.name"></option>
                            </select>
                        </div>

                        <div class="col-span-3">
                            <jet-label value="Date" for="created_at" />
                            <jet-input v-model="form.created_at" class="mt-2 py-3 px-4 block w-full text-gray-700" id="created_at" type="date" autocomplete="off" />
                            <InputError :message="errors.created_at" />
                        </div>

                        <div class="col-span-3">
                            <jet-label for="equipment">Équipement <span class="text-gray-500">(optionnel)</span></jet-label>
                            <select class="mt-2 py-3 px-4 block w-full text-gray-700 border-gray-200 focus:border-green-500 focus:ring-green-500 rounded-md leading-tight" id="equipment">
                                <option v-for="equipment in equipments" :key="equipment" v-text="equipment.name" :value="equipment.id"></option>
                            </select>
                        </div>

                        <div class="col-span-3">
                            <jet-label>Durée <span class="text-gray-500">(optionnel)</span></jet-label>
                            <jet-input class="mt-2 py-3 px-4 block w-full text-gray-700" type="number" min="1" max="24"></jet-input>
                        </div>

                        <div class="col-span-2">
                            <jet-label>Engrais <span class="text-gray-500">(optionnel)</span></jet-label>
                            <select class="mt-2 py-3 px-4 block w-full text-gray-700 border-gray-200 focus:border-green-500 focus:ring-green-500 rounded-md leading-tight" id="fertilizer">
                                <option v-for="fertilizer in fertizers" :key="fertilizer" v-text="fertilizer.name" :value="fertilizer.id"></option>
                            </select>
                        </div>

                        <div class="col-span-2">
                            <jet-label>Quantité</jet-label>
                            <jet-input class="mt-2 py-3 px-4 block w-full text-gray-700" type="number" placeholder=""></jet-input>
                        </div>

                        <div class="col-span-2">
                            <jet-label value="Montant"></jet-label>
                            <jet-input class="mt-2 py-3 px-4 block w-full text-gray-700" v-model="form.cost" for="cost" type="number"></jet-input>
                        </div>

                        <div class="col-span-6">
                            <jet-label>Description <span class="text-gray-500">(optionnel)</span></jet-label>
                            <textarea rows="3" class="mt-2 resize-none block w-full text-gray-700 border-gray-200 focus:border-green-500 focus:ring-green-500 rounded-md leading-tight"></textarea>
                        </div>

                        <fieldset class="col-span-6">
                            <jet-label>Activities</jet-label>
                            <div class="mt-2 grid gap-2 grid-cols-4">
                                <div v-for="activity in activities" :key="activity" class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <jet-input class="text-green-500" :id="activity.id" type="checkbox"></jet-input>
                                    </div>
                                    <jet-label :for="activity.id" class="ml-3" v-text="activity.title"></jet-label>
                                </div>
                            </div>
                        </fieldset>

                    </template>
                    <template #actions>
                        <jet-button>Enregistrer ouvrier</jet-button>
                    </template>
                </form-section>
            </div>
        </div>
    </app-layout>
</template>

<script>

import JetButton from '@/Components/Button';
import InputError from '@/Components/InputError';
import JetInput from '@/Components/Input';
import JetLabel from '@/Components/Label';
import FormSection from '@/Components/FormSection';
import AppLayout from '@/Layouts/Authenticated';

export default {
    components: {
        AppLayout, FormSection, JetLabel, JetInput, InputError, JetButton
    },

    props: {
        errors: Object,
        activities: Array,
        users: Array,
        equipments: Array,
        fertilizers: Array
    },

    data () {
        return {
            form: {
                activity_id: '',
                created_at: '',
                cost: '',
                description: '',
                status: '',
                user_id: '',
                fertilizer_id: '',
                equipment_id: ''

            }
        }
    },

    methods: {
        submit () {
            this.$inertia.post(this.route('users.store'), this.form);
        }
    },

    mounted() {
        this.form.created_at = new Date().toLocaleDateString('en-CA');
    }


}
</script>
