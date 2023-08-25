<x-layout title="Mostrar Clients">
    <x-clients.form :action="route('clients.update', $client->id)" :create="false" :client="$client" :update="false" :button="false" />
</x-layout>
