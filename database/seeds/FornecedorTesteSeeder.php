<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorTesteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save();

        Fornecedor::create([
            'nome' => 'Fornecedro 400',
            'site' => 'fornecedor400.com.br',
            'uf' => 'RS',
            'email' => 'contato@fornecedor400.com.br'
        ]);

        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedro 800',
            'site' => 'fornecedor400.com.br',
            'uf' => 'SP',
            'email' => 'contato@fornecedor400.com.br'
        ]);
    }
        
}
