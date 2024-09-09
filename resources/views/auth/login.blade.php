<x-layout>
    <x-page-heading>Log In</x-page-heading>

    <x-forms.form method="POST" action="/login">
        <x-forms.input label="Email" type="email" name="email" />
        <x-forms.input label="Password" type="password" name="password" />

        <x-forms.button>Log In</x-forms.button>
    </x-forms.form>
</x-layout>
