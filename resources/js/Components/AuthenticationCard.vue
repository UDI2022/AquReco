<template>
    <div class="AuthenticationCard">
        <div class="flex flex-col sm:justify-center items-center sm:pt-0">
            <div>
                <slot name="logo" />
            </div>

            <div class="w-full sm:max-w-md px-6 py-4 overflow-hidden sm:rounded-lg">
                <slot />
            </div>
        </div>
    </div>
</template>

<style>

</style>
