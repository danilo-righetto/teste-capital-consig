<x-layout title="Mostrar Clients">
    <x-clients.form :action="route('clients.update', $client->id)" :client="$client" :update="true" :button="true" />
</x-layout>
