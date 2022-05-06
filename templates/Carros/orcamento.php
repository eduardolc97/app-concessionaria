<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carro $carro
 */
?>
<div class="row" id="page-orcamento">
    <aside class="column">
        <div class="side-nav content">
            <h5 class="heading"><?= __('Selecione um carro') ?></h5>
            <?php foreach($carros as $carro){ ?>
                <a href="javascript:void(0)" onClick="getCarro(<?= $carro['id'] ?>)" class="carro" id="carro-<?= $carro['id'] ?>">
                    <?= 
                        $this->Html->image(
                            md5($carro['id']).'.jpg', 
                            [ 'alt' => htmlspecialchars($carro['nome'], ENT_QUOTES, 'UTF-8') ]
                        ) 
                    ?>
                    <p><?= $carro['nome'] ?></p>
                </a>
            <?php } ?>    
        </div>
    </aside>
    <div class="column-responsive">
        <div class="carros view content d-none">
            <div id="carro-info">
                <h3 class="nome"></h3>
                <p class="descricao"></p>
                <h4>R$ <span class="preco money"></span></h4>
            </div>
            <div class="simulacao">
                <h4><?= h('Faça sua simulação') ?></h4>
                <?= $this->Form->create(); ?>
                    <?= $this->Form->input('entrada', ['Placeholder' => 'Valor de entrada', 'class' => 'money', 'id' => 'entrada', 'required'=>'true']); ?>
                    <?= $this->Form->input('parcelas', ['type'=>'select', 'label'=>'Parcelas', 'options'=>['6'=>'6','12'=>'12','24'=>'24','48'=>'48'], 'id' => 'parcelas']); ?>
                    <?= $this->Form->input('total', ['type'=>'hidden', 'class'=>'preco', 'id' => 'valor']); ?>
                    <?= $this->Form->submit('Ver orçamento');?>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
    <div class="column-responsive">
        <div class="simulacao-completa view content d-none">
            <div class="simulacao-info">
                <h3><?= h('Sua simulação') ?></h3>
                <div class="d-flex valores">
                    <h4><?= h('Valor total do veículo') ?><br>R$<span id="valor-total"></span></h4>
                    <h4><?= h('Valor da entrada') ?><br>R$<span id="valor-entrada"></span></h4>
                    <h4><?= h('Valor a ser parcelado') ?><br>R$<span id="subtotal"></span></h4>
                </div>
                <div class="parcelas-info">
                    <h4>
                        <span id="qtd-parcelas"></span>x de 
                        <span class="wrapper-valor-parcelas">R$ 
                            <span id="valor-parcelas"></span>
                        </span>
                        <span>sem juros</span>
                    </h4>
                </div>
                <div class="finalizar-compra">
                    <input type="submit" value="Seguir com nossos consultores">
                    <input type="submit" value="Documentos necessários">
                    <input type="submit" value="Formas de pagamento que aceitamos">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
function getCarro(id){
    jQuery('.carros').removeClass('d-none').addClass('loading');
    jQuery('.simulacao-completa').addClass('d-none');
    $.ajax({ 
        headers: {
            'X-CSRF-Token': <?= json_encode($csrfToken) ?>
        },
        type: 'GET', 
        url: '<?= $this->Url->build(['action'=>'view']); ?>/'+id,
        success: function(data){     
            var dataParsed = JSON.parse(data);
            jQuery.each(dataParsed, function(i, o){
                jQuery('#carro-info .'+i).html(o);
            })
            jQuery('input.preco').val(dataParsed.preco);
            jQuery('.money').unmask().mask('000.000.000.000.000,00', {reverse: true});
            jQuery('#entrada').val('');
            jQuery('.carros').removeClass('loading');
        }
    }); 
}

jQuery('form').on('submit', function(event){
    event.preventDefault();
        
    if(parseFloat(jQuery('#entrada').val().replace(".", "").replace(',', '.')) > parseFloat(jQuery('#valor').val())){
        alert('A entrada não pode ser maior que o valor total do veículo.');
        return false;
    }

    jQuery('.simulacao-completa').removeClass('d-none');

    var mask = '000.000.000.000.000,00';

    var total           = parseFloat(jQuery('#valor').val()).toFixed(2);
    var entrada         = parseFloat(jQuery('#entrada').val().replace(".", "").replace(',', '.')).toFixed(2);
    var qtdparcelas     = parseInt(jQuery('#parcelas').val());

    var subtotal        = total-entrada;
    var valorParcelas    = parseFloat(subtotal / qtdparcelas).toFixed(2);

    jQuery('#valor-total').html(total).unmask().mask(mask, {reverse: true});
    jQuery('#valor-entrada').html(entrada).unmask().mask(mask, {reverse: true});
    jQuery('#subtotal').html(subtotal.toFixed(2)).unmask().mask(mask, {reverse: true});
    jQuery('#qtd-parcelas').html(qtdparcelas).unmask().mask(mask, {reverse: true});
    jQuery('#valor-parcelas').html(valorParcelas).unmask().mask(mask, {reverse: true});

    return false;
})

</script>
