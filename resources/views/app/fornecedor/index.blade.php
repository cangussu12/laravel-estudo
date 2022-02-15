<h3>Fornecedor</h3>

@php
    /*
    if() {

    } else {

    }
    */
@endphp

{{-- @unless executa se o retorno for false --}}
@isset($fornecedores)

    @forelse($fornecedores as $indice => $fornecedor)
        interação atual: {{ $loop->iteration }}
        <br>
        Fornecedor: @{{ $fornecedor['nome'] }}
        <br>
        Status: @{{ $fornecedor['status'] }}
        <br>
        CNPJ: @{{ $fornecedor['cnpj'] ?? ''}}
        <br>
        Telefone: (@{{ $fornecedor['ddd'] ?? ''}}) {{ $fornecedor['telefone'] ?? ''}}
        <br>
        @if($loop->first)
            Primeira interação do loop
        @endif

        @if($loop->last)
            ultima interação do loop
        @endif
        <hr>
    @empty
        Não existem fornecedores cadastrados !!!
   
    @endforelse
@endisset

