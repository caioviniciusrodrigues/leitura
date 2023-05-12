
<style>

*:focus {outline:none;}
body {
  background: #273476;
  color: #fff;
  font-family: 'Open Sans', sans-serif;
  text-align: center;
  margin: 30px;
  overflow:hidden;
}

.fa-5, h2 {
    font-size: 12em;
    font-weight: 600;
    display:inline-block;
    margin: 0;
}

.content {

}

#abutton {
  width: 500px;
  height: 60px;
  font-size: 2em;
  background: white;
  border: 0;
  margin-top: 10px;
  cursor:pointer;
  transition: all .2s;
  -moz-transition: all .2s;
  -webkit-transition: all .2s;
}

#abutton:hover {
  transform: scale(.989);
  -moz-transform: scale(.989);
  -webkit-transform: scale(.989);
  background: #f4f4f4;
}

a {
  position:fixed;
  bottom: 10px;
  right:10px;
  color: #ddd;
}

.box {
    display: flex;
    justify-content: center;
    align-items: center;
}

</style>

<script>
    function home() {
        window.location.href = "{{ route('home.index') }}";
    }
</script>

<div class="box">
    <div class="itens">
        <span><img src="{{ asset('img/logo.png') }}" alt=""></span> <br>
        <span><i class="fa fa-chain-broken fa-5"></span></i><h2><span> 4</span><span>0</span><span>4</span></h2>
        <h1>Essa página não existe</h1>
        <span><button id="abutton" value="abc" onclick="home();">Voltar para página principal</button></span>
    </div>
</div>

