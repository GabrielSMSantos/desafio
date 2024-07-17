@extends('index')

@section('content')
    <a href="{{ route('customer.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 uppercase">Novo Cliente</a>

    <div class="relative overflow-x-auto shadow sm:rounded-lg mt-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">#</th>
                    <th scope="col" class="px-6 py-3">
                        CPF
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Sobrenome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Data de Nascimento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        E-mail
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gênero
                    </th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">{{ $customer->id }}</td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $customer->cpf }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $customer->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $customer->lastname }}
                        </td>
                        <td class="px-6 py-4">
                            {{ date('d/m/Y', strtotime($customer->birth_date)) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $customer->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $customer->gender == "M" ? "Masculino" : "Feminino" }}
                        </td>
                        <td class="flex items-center px-6 py-4">
                            <a href="{{ route('customer.edit', ['customer' => $customer->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>

                            <form action="{{ route('customer.delete', ['customer' => $customer->id]) }}" method="post">
                                @csrf
                                @method('delete')

                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remover</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center p-3 text-slate-400">Nenhum cliente adicionado até o momento...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if ($customers->count())
            <nav>
                <ul class="flex items-center justify-end text-sm p-2">
                    <li>
                        <a href="?page={{ $customers->currentPage() == 1 ? 1 : $customers->currentPage() - 1 }}" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Anterior</span>
                            <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                        </a>
                    </li>
                    @if ($customers->currentPage() > 1)
                        <li>
                            <a href="?page={{ $customers->currentPage() - 1 }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $customers->currentPage() - 1 }}</a>
                        </li>
                    @endif
                    <li>
                        <a href="?page={{ $customers->currentPage() }}" class="flex items-center justify-center px-3 h-8 leading-tight text-white bg-blue-700 border border-gray-300 hover:bg-blue-800 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $customers->currentPage() }}</a>
                    </li>
                    @if ($customers->currentPage() < $pages)
                        <li>
                            <a href="?page={{ $customers->currentPage() + 1 }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $customers->currentPage() + 1 }}</a>
                        </li>
                    @endif
                    <li>
                        <a href="?page={{ $customers->currentPage() == $customers->lastPage() ? $customers->lastPage() : $customers->currentPage() + 1 }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Próximo</span>
                        <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        @endif
    </div>
@endsection
