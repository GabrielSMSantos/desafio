@extends('index')

@section('breadcrumbs')
    <li class="inline-flex items-center">
        <span class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
            Clientes
        </span>
    </li>
    <li>
        <div class="flex items-center">
        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
            <a href="{{  route('customer.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">Listagem de Clientes</a>
        </div>
    </li>
    <li aria-current="page">
        <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-medium text-blue-500 md:ms-2">Novo Cliente</span>
        </div>
    </li>
@endsection

@section('content')
    <form action="{{ route('customer.store') }}" method="post">
        @csrf

        <div class="grid grid-cols-12 gap-6 mb-6">
            <div class="col-span-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    CPF
                    <b class="text-red-500">*</b>
                </label>
                <input type="text" name="cpf" value="{{ old('cpf') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="000.000.000-00" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}"  />
                @error('cpf')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-span-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nome
                    <b class="text-red-500">*</b>
                </label>
                <input type="text" name="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  maxlength="50" />
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-span-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Sobrenome
                    <b class="text-red-500">*</b>
                </label>
                <input type="text" name="lastname" value="{{ old('lastname') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  maxlength="50" />
                @error('lastname')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-span-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Data de Nascimento
                    <b class="text-red-500">*</b>
                </label>
                <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  />
                @error('birth_date')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-span-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    E-mail
                    <b class="text-red-500">*</b>
                </label>
                <input type="email" name="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  />
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-span-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Gênero
                    <b class="text-red-500">*</b>
                </label>
                <select name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option selected value="">Selecione</option>
                    <option value="M" {{ old('gender') == "M" ? "selected" : "" }}>Masculino</option>
                    <option value="F" {{ old('gender') == "F" ? "selected" : "" }}>Feminino</option>
                </select>
                @error('gender')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-row justify-between">
            <a href="{{ route('customer.index') }}" class="text-white bg-slate-400 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center uppercase">Cancelar</a>

            <div>
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center uppercase" onclick="window.location.reload()">Recomeçar</button>
                <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center uppercase">Inserir</button>
            </div>
        </div>
    </form>
@endsection
