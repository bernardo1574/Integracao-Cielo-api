<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="lib/img/carrinho.svg" alt="" width="72" height="72">
        <h2>Pagamento Online</h2>
        <div class="text-left">
            <a class="btn btn-primary" href="index.php">
                <i class="fa fa-backward" aria-hidden="true"></i>
                voltar tela inicial
            </a>
        </div>
        <hr>
    </div>
    <div class="row card" >
        <div class="card-body">
            <div class="order-md-1">
                <form class="needs-validation" novalidate action="index.php?subMod=data" method="POST">
                    <input type="hidden" name="total" id="total" value="<?=str_replace(".", "", $_POST['valorTotal'])?>">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="" required>
                            <div class="invalid-feedback">
                                Por favor, digite o seu Nome!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cpf">Cpf</label>
                            <input type="text" class="form-control cpf" name="cpf" id="cpf" placeholder="000.000.000-00" value="" required >
                            <div class="invalid-feedback">
                                Por favor, digite o seu Cpf!
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="exemplo@exemplo.com" required>
                            <div class="invalid-feedback">
                                Por favor, digite o seu Email!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nascimento">Data de nascimento</label>
                            <input type="date" class="form-control" name="nascimento" id="nascimento" required>
                            <div class="invalid-feedback">
                                Por favor, digite a data do seu nascimento!
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="cep">Cep:</label>
                            <input name="cep" type="text" class="form-control cep" id="cep" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="uf">Estado:</label>
                            <input name="uf" type="text" class="form-control" id="uf" value="" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cidade">Cidade:</label>
                            <input type="text" name="cidade" class="form-control" id="cidade" required value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="rua">Rua:</label>
                            <input type="text" id="rua" class="form-control" name="rua" value="" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="rua">Bairro:</label>
                            <input type="text" id="bairro" class="form-control" name="bairro" value="" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="numero">Número:</label>
                            <input type="text" name="numero" id="numero" value="" class="form-control" onkeyup="somenteNumeros(this);">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="complemento">Complemento:</label>
                            <input type="text" name="complemento" id="complemento" class="form-control" value="">
                        </div>
                    </div>
                    <hr class="mb-4">
                    <h4 class="mb-3">Payment</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-flag">Flag</label>
                            <select name="cc-flag" id="cc-flag" class="form-control custom-select" required>
                                <option value="Master">Master Card</option>
                                <option value="Visa">Visa</option>
                                <option value="Amex">American Express</option>
                                <option value="Elo">Elo</option>
                                <option value="Diners">Diners Club</option>
                                <option value="Discover">Discover</option>
                                <option value="JCB">JCB</option>
                                <option value="Aura">Aura</option>
                                <option value="Hipercard">Hipercard</option>
                            </select>
                            <div class="invalid-feedback">
                                Flag is required
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Credit card number</label>
                            <input type="text" class="form-control card-credit" name="cc-number" id="cc-number" placeholder="" required>
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Expiration</label>
                            <input type="text" class="form-control Expiration" name="cc-expiration" id="cc-expiration" placeholder="" required>
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-cvv">CVV</label>
                            <input type="text" class="form-control CVV" name="cc-cvv" id="cc-cvv" placeholder="" required>
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function somenteNumeros(num) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
            campo.value = "";
        }
    }
        function limpa_formulario_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value=(conteudo.logradouro);
                document.getElementById('bairro').value=(conteudo.bairro);
                document.getElementById('cidade').value=(conteudo.localidade);
                document.getElementById('uf').value=(conteudo.uf);
                document.getElementById('ibge').value=(conteudo.ibge);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value="...";
                    document.getElementById('bairro').value="...";
                    document.getElementById('cidade').value="...";
                    document.getElementById('uf').value="...";

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulario_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulario_cep();
            }
        }
</script>
