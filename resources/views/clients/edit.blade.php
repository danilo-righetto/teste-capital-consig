<x-layout title="Mostrar Clients">
    <x-clients.form :action="route('clients.show', $client->id)" :client="$client" :create="false" :update="true" :button="true" />
</x-layout>
