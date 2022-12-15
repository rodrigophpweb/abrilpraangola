<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <?php
                // Check rows existexists.
                if( have_rows('investiments') ):

                    // Loop through rows.
                    while( have_rows('investiments') ) : the_row();
                        // Load sub field value.
                        $cash = get_sub_field('cash');
                        $creditCard = get_sub_field('creditcard');
                        $validate = get_sub_field('validate'); ?>
                    
                    <h3>Investimentos</h3>
                    <ul>
                        <li>Investimento à vista: <strong>R$ <?php echo $cash;?></strong></li>
                        <li>Investimento Cartão de Crédito:  <strong>R$ <?php echo $creditCard;?></strong></li>
                        <li>Validade do pacote: <strong><?php echo $validate;?></strong></li>
                    </ul>
                    <?php endwhile;
                endif;
            ?>
            <h4>Faça sua inscrição</h4>
            <p>Abril pra Angola 2023 está disponível somente para pagamentos em depósito em conta corrente, ou cartão de crédito. <a href="<?php echo site_url('inscricao');?>" title="Inscreva-se">Inscreva-se </a>agora.</p>
            <p>Para a compra deste pacote para pagamento a vista fazer depósito utilizando os dados bancário abaixo:</p>

            <h5>Caixa Econômica Federal</h5>
            <ul>
                <li><strong>Agência: </strong>0238</li>
                <li><strong>Conta: </strong>00002950-1</li>
                <li><strong>Operação: </strong>013</li>
                <li><strong>Favorecido: </strong>Messias dos Santos</li>
            </ul>

            <p>Após a realização do depósito enviar o comprovante do depósito para <a href="mailto:mestremeinha@hotmail.com" title="Mestre Meinha" target="_blank">mestremeinha@hotmail.com</a></p>
        </div>
    </div>
</div>