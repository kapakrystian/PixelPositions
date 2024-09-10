<x-layout>
    <x-page-heading>New Job</x-page-heading>


    <x-forms.form method="POST" action="/jobs">
        <x-forms.input name="title" label="Title" placeholder="Web Developer" />
        <x-forms.input name="salary" label="Salary" placeholder="$90,000 USD per year" />
        <x-forms.input name="location" label="Location" placeholder="Winter Park, Florida" />

        <x-forms.select label="Schedule" name="schedule" class="">
            <option>Part Time</option>
            <option>Full Time</option>
        </x-forms.select>

        <x-forms.input name="url" label="URL" placeholder="https://acme.com/jobs/ceo-wanted" />
        <x-forms.checkbox name="featured" label="Feature (Costs Extra)" />

        <x-forms.divider />

        <x-forms.input label="Tags (Comma separated)" name="tags" placeholder="it, programming, video" />

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
