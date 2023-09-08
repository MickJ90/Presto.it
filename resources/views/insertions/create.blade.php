<x-main>
    <x-navbar />
    <div class="container mt-4">
        <x-success/>
        <x-error/>
    </div>
    <x-slot:title>{{__('ui.addInsertion')}}</x-slot:title>
    <livewire:insertion-create-form />
    <livewire:insertion-list />

</x-main>