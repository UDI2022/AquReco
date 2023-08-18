<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />
    <Header />

    <div id="loginform">
        <AuthenticationCard>
        <!--
        <template #logo>
            <AuthenticationCardLogo />
        </template>
        -->

            <h1>Login</h1>
            <div class="logininput">
            
                <div v-if="status" class="font-medium text-sm text-green-600">
                    {{ status }}
                </div>

                <form @submit.prevent="submit">
                    <div class="">
                        <InputLabel for="email" value="Email" />
                        <TextInput
                            id="email"
                            v-model="form.email"
                            type="email"
                            class="w-full"
                            required
                            autofocus
                            autocomplete="username"
                        />
                        <InputError :message="form.errors.email" />
                    </div>

                    <div class="mt-4 ">
                        <InputLabel for="password" value="Password" />
                        <TextInput
                            id="password"
                            v-model="form.password"
                            type="password"
                            class="w-full"
                            required
                            autocomplete="current-password"
                        />
                        <InputError :message="form.errors.password" />
                    </div>

                    <!--
                    <div class="block mt-4">
                        <label class="flex items-center">
                            <Checkbox v-model:checked="form.remember" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                    </div>
                    -->
                    <div class="forgotpass">
                        <a href="/ResetPassword">
                            <i class="fa-solid fa-clipboard-question" style="font-size: 1.1rem;">パスワードを忘れた場合</i>
                        </a>
                    </div>


                    <div class="loginbutton">
                        <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Forgot your password?
                        </Link>
                            
                        <PrimaryButton class="button button-no-uppercase" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Log in
                        </PrimaryButton>
                    </div>

                    <!--forgot password-->
                </form>
            </div>
        </AuthenticationCard>
    </div>
    <knowAqureco />
    <Footer />
</template>

<style>
    .button-no-uppercase {
        text-transform: none;
    }

    #loginform {
 
    }
    #loginform h1{
        font-size: 2rem;
    }
    .logininput{
        padding-left: 10%;
    }
    .loginbutton {
        padding-right:10%;
    }
    .button {
            width: 100%;
            display: flex;
            justify-content: center;
            margin: 10% 0;
            padding: 20px 10% 20px 20px;
            border-radius: 20%px;
            background-color: #fff;
            color: #000;
            font-size: 1.5rem;
            border: 1px solid #982176;
            box-shadow: 10px 5px 5px 0px rgba(0, 0, 0, 0.3);
    }
    .forgotpass {
        margin: 7% 0 0 0;
    }
</style>