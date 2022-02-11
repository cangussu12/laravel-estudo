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
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    CNPJ: {{ $fornecedores[0]['cnpj'] ?? 'Dado não foi preenchido'}}
    <!--
        $variavel testada não estiver definida
        ou
        $variavel testada possuir o valor null
@endisset
