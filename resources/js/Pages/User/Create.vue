<template>
    <app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form-section @submit.prevent="submit">
                    <template #title>
                        Sidebar
                    </template>
                    <template #description>
                        sidebar
                    </template>
                    <template #form>
                        <div class="col-span-6">
                            <jet-label for="name" value="Nom" />
                            <jet-input v-model="form.name" class="mt-2 py-3 px-4 block w-full text-gray-700" id="name" type="text" autocomplete="off" />
                            <InputError class="mt-2" :message="errors.name" />
                        </div>
                        <div class="col-span-3">
<!--                            <jet-label for="national_identification_number" value="CIN" />-->
<!--                            <jet-input v-model="form.national_identification_number" id="national_identification_number" type="text" class="block w-full" autocomplete="off" />-->
<!--                            <InputError :message="errors.national_identification_number" />-->

                            <jet-label value="CIN" for="national_identification_number" />
                            <jet-input v-model="form.national_identification_number" class="mt-2 py-3 px-4 block w-full text-gray-700" id="national_identification_number" type="text" autocomplete="off" />
                            <InputError :message="errors.national_identification_number" />
                        </div>
                        <div class="col-span-3">
                            <jet-label for="phone_number" value="Numéro de téléphone" />
                            <jet-input v-model="form.phone_number" class="mt-2 py-3 px-4 block w-full text-gray-700" id="phone_number" type="text" autocomplete="off" />
                            <InputError :message="errors.phone_number" />
                        </div>
                        <div class="col-span-3">
                            <jet-label for="username" value="Nom d'utilisateur" />
                            <jet-input v-model="form.username" class="mt-2 py-3 px-4 block w-full text-gray-700 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none" :disabled="form.role !== 2" id="username" type="text" autocomplete="off" />
                            <InputError :message="errors.username" />
                        </div>
                        <div class="col-span-3">
                            <jet-label for="password" value="Mot de pass" />
                            <jet-input v-model="form.password" id="password" type="password" class="mt-2 py-3 px-4 block w-full text-gray-700 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none" :disabled="form.role !== 2" />
                            <InputError :message="errors.password" />
                        </div>
                        <div class="col-span-3">
                            <div class="flex gap-4">
                                <div class="flex items-center">
                                    <jet-input class="text-indigo-500" type="radio" id="staionnaire" name="role" v-model.number="form.role" :value="4" checked />
                                    <jet-label for="staionnaire" value="Stationnaire" class="ml-2" />
                                </div>
                                <div class="flex items-center">
                                    <jet-input class="text-indigo-500" type="radio" id="gardien" name="role" :class="{'border-gray-200': has.guardian}" v-model.number="form.role" :value="3" :disabled="has.guardian" />
                                    <jet-label for="gardien" value="Gardien" class="ml-2" :class="{'text-gray-300': has.guardian}" />
                                </div>
                                <div class="flex items-center">
                                    <jet-input type="radio" id="gérant" name="role" :class="{'border-gray-200': has.manager}" v-model.number="form.role" :value="2" :disabled="has.manager" />
                                    <jet-label for="gérant" value="Gérant" class="ml-2" :class="{'text-gray-300': has.manager}" />
                                </div>
                            </div>
                        </div>
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
        has: Array
    },

    data () {
        return {
            form: {
                name: '',
                national_identification_number: '',
                phone_number: '',
                username: '',
                password: '',
                role: 4
            }
        }
    },

    methods: {
        submit () {
            this.$inertia.post(this.route('users.store'), this.form);
        }
    }
}
</script>
