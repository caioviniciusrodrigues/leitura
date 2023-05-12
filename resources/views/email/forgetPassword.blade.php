
    <div style="display: flex; align-items: center">
        <div style="display: flex;">

        </div>
        <div style="display: flex; margin-left: 10px">
            <h1 style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size: 2rem;">
                Redefinição de Senha
            </h1>
        </div>
    </div>

    <h3 style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;"> Você solicitou um link para mudar sua senha. Você pode fazer isso clicando no link abaixo: </h3>
    <br>

    <a

    style="
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
"
href="{{ route('reset.password.get', $token) }}">Clique aqui para mudar a senha</a>

    <br><br><br>
    <div style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
        Se você não requisitou, por favor ignore este e-mail. Sua senha está segura e não foi alterada.

        <br><br><br>
        <b style="color: red">**Esta é uma mensagem automática e não deve ser respondida.</b>
        <br><br>
        Divisão da Tecnologia da Informação (DTI)
        <br>
        Endereço: Rua Serafim Carlos, 571 CEP 09570-410
        <br>
        SP - São José, São Caetano do Sul

        <br><br>
        <a href="https://saed.saocaetanodosul.sp.gov.br">https://dti-gerenciamento.saocaetanodosul.sp.gov.br</a>
        <br><br>
        E-mail: <a href="mailto:saed@saocaetanodosul.sp.gov.br">dti@saocaetanodosul.sp.gov.br</a>

        <br><br><br>

        <div class="footer-copyright text-center py-3">
            © <?php call_user_func(function($y){$c=date('Y');echo $y.(($y!=$c)?'-'.$c:'');}, 2021); ?> Copyright:
            <a href="http://www.saocaetanodosul.sp.gov.br/"> Prefeitura Municipal de São Caetano do Sul</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <img src="https://desenvolve.saocaetanodosul.sp.gov.br/imagens/DTI-AF-COORD-footer.png" />
        </div>

    </div>


