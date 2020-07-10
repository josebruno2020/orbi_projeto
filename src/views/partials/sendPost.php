<div id="contato" style="background-image:url(<?=$base;?>/assets/images/fundo.jpg);"><br>
            
    <form method="POST" id="sendPost">
        <div  class="form-group">
            <label for="name">Nome:</label>
            <input id="name" type="text" name="name" class="form-control" placeholder="Digite seu Nome" title="Nome" required>
        </div>
        <div  class="form-group">
            <label for="email">E-mail:</label>
            <input id="email"type="email" name="email" class="form-control" placeholder="email@exemplo.com" required>
        </div>
        <div  class="form-group">
            <label for="tel">Telefone para contato:</label>
            <input id="tel"type="tel" name="tel" class="form-control" placeholder="(99)99999-9999" required>
        </div>
        <div  class="form-group">
            <label for="mensagem">Sua mensagem:</label>
            <textarea id="mensagem" class="form-control" rows="3" name="body" required></textarea>
            <br>
        </div>
        <div  class="form-group">
            <input class="form-control btn btn-success btn-block" type="submit" value="Enviar">
        </div>
        
    </form>
</div>