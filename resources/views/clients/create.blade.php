<x-layout title="Criar Clients">
    <x-clients.form :action="route('clients.store')" :update="false" :create="true" :button="true" />
</x-layout>
