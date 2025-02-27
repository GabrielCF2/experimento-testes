<?php
Class TestePessoaCest{
    public function PessoaCreate(FunctionalTester $I){
        $I->expectTo('Verificar se o cadastro de uma pessoa está correto');
        $I->amOnRoute('pessoa/create');
        $I->submitForm('form',[
            'Pessoa[nome]' => 'João',
            'Pessoa[cpf]' => '86523435008',
            'Pessoa[cep]' => '69945000',
            'Pessoa[rua]' => 'Rua 01',
            'Pessoa[estado_id]' => '1',
            'Pessoa[cidade_id]' => '1',
            'Pessoa[profissao]' => 'Estudante',
            'Pessoa[complemento]' => 'Perto do mercado'
        ]);
        $I->seeRecord('app\models\Pessoa',[
            'nome' => 'João',
        ]);
        $I->seeRecord('app\models\Pessoa',[
            'cpf'=> '86523435008',
        ]);
        $I->seeRecord('app\models\Pessoa',[
            'cep' => '69945000',
        ]);
        $I->seeRecord('app\models\Pessoa',[
            'rua' => 'Rua 01',
        ]);
        $I->seeRecord('app\models\Pessoa',[
            'estado_id' => '1',
        ]);
        $I->seeRecord('app\models\Pessoa',[
            'cidade_id' => '1',
        ]);
        $I->seeRecord('app\models\Pessoa',[
            'profissao' => 'Estudante',
        ]);
        $I->seeRecord('app\models\Pessoa',[
            'complemento' => 'Perto do mercado',
        ]);
    }
    
    public function pessoaUpdate(FunctionalTester $I){
        $I->expectTo('Verificar se a atualização de informações de uma pessoa está correta');
        $model = $I->grabRecord('app\models\Pessoa', array('nome' => 'João'));
        $I->amOnRoute('pessoa/update',['id'=> $model->id]);
        $I->submitForm('form',[
            'Pessoa[nome]' => 'João Pedro',
            'Pessoa[cpf]' => $model->cpf,
            'Pessoa[cep]' => $model->cep,
            'Pessoa[rua]' => 'Rua 02',
            'Pessoa[estado_id]' => $model->estado_id,
            'Pessoa[cidade_id]' => $model->cidade_id,
            'Pessoa[profissao]' => 'Programador',
            'Pessoa[complemento]' => "Perto da faculdade"
        ]);
        $I->seeRecord('app\models\Pessoa', [
            'nome' => 'João Pedro',
        ]);
        $I->seeRecord('app\models\Pessoa', [
            'cpf' => '86523435008',
        ]);
        $I->seeRecord('app\models\Pessoa', [
            'cep'=>'69945000',
        ]);
        $I->seeRecord('app\models\Pessoa', [
            'rua'=>'Rua 02',
        ]);
        $I->seeRecord('app\models\Pessoa', [
            'estado_id'=>'1',
        ]);
        $I->seeRecord('app\models\Pessoa', [
            'cidade_id'=>'1',
        ]);
        $I->seeRecord('app\models\Pessoa', [
            'profissao'=>'Programador',
        ]);
        $I->seeRecord('app\models\Pessoa', [
            'complemento'=>'Perto da faculdade',
        ]);
    }
}