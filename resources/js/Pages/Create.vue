
<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    primary_legal_counsel: '',
    dob: '',
    profile_image: null,
    case_details: '',
});

const submit = () => {
    form.post(route('profile.client'), {
        onSuccess: () => {
            console.log("SUBMITTED SUCCESSFULLY");
            
            form.reset();
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Form submitted successfully.',
                timer: 3000, // Display message for 3 seconds
                timerProgressBar: true,
                onClose: () => {
                    // Redirect to "/clients" page after successful submission
                    window.location.href = '/clients';
                }
            });
        },
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Profile Client" />

        <h2 class="text-center text-gray-900 text-xl font-bold ">Create Profile</h2>
        
        <form @submit.prevent="submit">
            <div class="mt-4">
                <InputLabel for="first_name" value="First Name" required="true" />

                <TextInput
                    id="first_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.first_name"
                    required
                    autofocus
                    autocomplete="first_name"
                />

                <InputError class="mt-2" :message="form.errors.first_name" />
            </div>

            <div class="mt-4">
                <InputLabel for="last_name" value="Last Name" required="true" />

                <TextInput
                    id="last_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.last_name"
                    required
                    autocomplete="last_name"
                />

                <InputError class="mt-2" :message="form.errors.last_name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" required="true" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="primary_legal_counsel" value="Primary Legal Counsel" required="true" />

                <TextInput
                    id="primary_legal_counsel"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.primary_legal_counsel"
                    required
                    autocomplete="primary_legal_counsel"
                />

                <InputError class="mt-2" :message="form.errors.primary_legal_counsel" />
            </div>

            <div class="mt-4">
                <InputLabel for="dob" value="Date of Birth" required="true" />

                <TextInput
                    id="dob"
                    type="date"
                    class="mt-1 block w-full"
                    v-model="form.dob"
                    required
                    autocomplete="dob"
                />

                <InputError class="mt-2" :message="form.errors.dob" />
            </div>

            <div class="mt-4">
                <InputLabel for="case_details" value="Case Details" required="true" />

                <TextArea
                    id="case_details"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.case_details"
                    required
                    autocomplete="case_details"
                />

                <InputError class="mt-2" :message="form.errors.case_details" />
            </div>

            <div class="mt-4">
                <InputLabel for="profile_image" value="Profile Image" />
                <input id="profile_image" class="mt-1 block w-full" type="file" @input="form.profile_image = $event.target.files[0]" />

                <InputError class="mt-2" :message="form.errors.profile_image" />
            </div>

            <div class="flex items-center justify-end mt-4">


                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Submit Profile
                </PrimaryButton>
            </div>
            
            <h2 class="h2 mt-12">
                OR CHECK EXISTING PROFILES BELOW
            </h2>
            <Link
                :href="route('clients')"
                class="text-xl text-red-900 font-black hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                Existing Profiles
            </Link>
        </form>
    </GuestLayout>
</template>
