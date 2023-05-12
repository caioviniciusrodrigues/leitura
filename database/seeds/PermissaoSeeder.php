<?php

use App\Permissao;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::delete('delete from permissoes');

        $usuarios1 = Permissao::firstOrcreate([
            'nome' =>'usuario-view',
            'descricao' =>'Acesso a lista de Usuários'
        ]);
        $usuarios2 = Permissao::firstOrcreate([
            'nome' =>'usuario-create',
            'descricao' =>'Adicionar Usuários'
        ]);
        $usuarios3 = Permissao::firstOrcreate([
            'nome' =>'usuario-edit',
            'descricao' =>'Editar Usuários'
        ]);
        $usuarios4 = Permissao::firstOrcreate([
            'nome' =>'usuario-delete',
            'descricao' =>'Deletar Usuários'
        ]);

        $papeis1 = Permissao::firstOrcreate([
            'nome' =>'papel-view',
            'descricao' =>'Listar Papéis'
        ]);
        $papeis2 = Permissao::firstOrcreate([
            'nome' =>'papel-create',
            'descricao' =>'Adicionar Papéis'
        ]);
        $papeis3 = Permissao::firstOrcreate([
            'nome' =>'papel-edit',
            'descricao' =>'Editar Papéis'
        ]);

        $papeis4 = Permissao::firstOrcreate([
            'nome' =>'papel-delete',
            'descricao' =>'Deletar Papéis'
        ]);

        $perfil1 = Permissao::firstOrcreate([
            'nome' =>'perfil-view',
            'descricao' =>'Acesso ao perfil'
        ]);

        $sobre = Permissao::firstOrcreate([
            'nome' =>'sobre-view',
            'descricao' =>'Sobre o sistema'
        ]);


        echo "Registros de Permissoes criados no sistema";
    }
}
