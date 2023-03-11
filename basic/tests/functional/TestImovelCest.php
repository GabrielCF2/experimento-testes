<?php
class TestImovelCest{
    public function imovelCreate(FunctionalTester $I){
        $I->expectTo('Verificar se o cadastro de informações de um imóvel está correto');
        $model = $I->grabRecord('app\models\Pessoa', array('nome' => 'João Pedro'));
        $I->amOnRoute('imovel/create');
        $I->submitForm('form',[
            'Imovel[nome]'=>'Casa',
            'Imovel[pessoa_id]'=>$model->id,
            'Imovel[cep]'=>'69945000',
            'Imovel[rua]'=>'Rua 01',
            'Imovel[estado_id]'=>'1',
            'Imovel[cidade_id]'=>'1',
            'Imovel[valor]'=>'120000',
            'Imovel[complemento]'=>'Perto do mercado'
        ]);
        $I->seeRecord('app\models\Imovel', [
            'nome'=>'Casa',
        ]);
        $I->seeRecord('app\models\Imovel', [
            'pessoa_id'=>$model->id,
        ]);
        $I->seeRecord('app\models\Imovel', [
            'cep'=>'69945000',
        ]);
        $I->seeRecord('app\models\Imovel', [
            'rua'=>'Rua 01',
        ]);
        $I->seeRecord('app\models\Imovel', [
            'estado_id'=>'1',
        ]);
        $I->seeRecord('app\models\Imovel', [
            'cidade_id'=>'1',
        ]);
        $I->seeRecord('app\models\Imovel', [
            'valor'=>'120000',
        ]);
        $I->seeRecord('app\models\Imovel', [
            'complemento'=>'Perto do mercado'
        ]);
    }

    public function imovelUpdate(FunctionalTester $I){
        $I->expectTo('Verificar se a atualização de informações de um imóvel está correta');
        $model = $I->grabRecord('app\models\imovel',array('nome'=>'Casa'));
        $model2 = $I->grabRecord('app\models\Pessoa', array('nome' => 'João Pedro'));
        $I->amOnRoute('imovel/update',['id'=>$model->id]);
        $I->submitForm('form',[
            'Imovel[nome]'=>'Casa Grande',
            'Imovel[pessoa_id]'=>$model->pessoa_id,
            'Imovel[cep]'=>$model->cep,
            'Imovel[rua]'=>'Rua 02',
            'Imovel[estado_id]'=>$model->estado_id,
            'Imovel[cidade_id]'=>$model->cidade_id,
            'Imovel[valor]'=>'140000',
            'Imovel[complemento]'=>'Perto da faculdade'
        ]);
        $I->seeRecord('app\models\Imovel', [
            'nome'=>'Casa Grande',
        ]);
        $I->seeRecord('app\models\Imovel', [
            'pessoa_id'=>$model2->id,
        ]);
        $I->seeRecord('app\models\Imovel', [
            'cep'=>'69945000',
        ]);
        $I->seeRecord('app\models\Imovel', [
            'rua'=>'Rua 02',
        ]);
        $I->seeRecord('app\models\Imovel', [
            'estado_id'=>'1',
        ]);
        $I->seeRecord('app\models\Imovel', [
            'cidade_id'=>'1',
        ]);
        $I->seeRecord('app\models\Imovel', [
            'valor'=>'140000',
        ]);
        $I->seeRecord('app\models\Imovel', [
            'complemento'=>'Perto da faculdade'
        ]);
    }
}