<!DOCTYPE html>
<html lang='pt-BR'>
  <head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto Fullcalendar</title>

<!-- Bootstrap 5 css -->
    <link href="css/bootstrap.css" rel="stylesheet">

<!-- FullCalendar css -->
    <link rel="stylesheet" href="css/custom.css">

<!-- Bootstrap Icons css -->    
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' >

  </head>

  <body>

    <div id='calendar'></div>

    <!-- 
      Modal incluido da 3 aula
      Substitui:
      id="visualizarModal"
      aria-labelledby="visualizarModalLabel"
      <h1 class="modal-title fs-5" id="visualizarModalLabel">Modal title</h1>
      retira o botão padrão de abertura da modal substituindo pela constante da config FullCalendar
      Em seguida setar a config no js do Fullcalendar
    -->

<!-- Modal visualizar -->
    <div class="modal fade" id="visualizarModal" tabindex="-1" aria-labelledby="visualizarModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="visualizarModalLabel">Visualizar Evento</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <dl class="row">
              <dt class="col-sm-3">ID:</dt>
              <!-- acrescenta o seletor id vinculando ao javascript -->
              <dd class="col-sm-9" id="visualizar_id"></dd>
              <dt class="col-sm-3">Título:</dt>
              <dd class="col-sm-9" id="visualizar_title"></dd>
              <dt class="col-sm-3">Inicio:</dt>
              <dd class="col-sm-9" id="visualizar_start"></dd>
              <dt class="col-sm-3">Fim:</dt>
              <dd class="col-sm-9" id="visualizar_end"></dd>
            </dl>
          </div>

        </div>
      </div>
    </div>
<!-- end Modal visualizar -->

<!-- Modal Cadastrar -->
      <div class="modal fade" id="cadastrarModal" tabindex="-1" aria-labelledby="cadastrarModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="cadastrarModalLabel">Cadastrar Evento</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Form -->
            <form method="POST" id="formCadEvento">

              <div class="row mb-3">

                <label for="cad_title" class="col-sm-2 col-form-label">Título</label>
                <div class="col-sm-10">
                  <input type="text" name="cad_title" class="form-control" id="cad_title" placeholder="Título do Evento">
                </div>

                <label for="cad_start" class="col-sm-2 col-form-label">Início</label>
                <div class="col-sm-10">
                  <input type="datetime-local" name="cad_start" class="form-control" id="cad_start" placeholder="Título do Evento">
                </div>

                <label for="cad_end" class="col-sm-2 col-form-label">Fim</label>
                <div class="col-sm-10">
                  <input type="datetime-local" name="cad_end" class="form-control" id="cad_end" placeholder="Título do Evento">
                </div>

                <label for="cad_color" class="col-sm-2 col-form-label">Cor</label>
                <div class="col-sm-10">
                  <select name="cad_color" class="form-control" id="cad_color">
                    <option value="">Selecione</option>
                    <option style="color:#FFD700" value="#FFD700">Amarelo</option>
                    <option style="color:#0071c5" value="#0071c5">Azul Turquesa</option>
                    <option style="color:#FF4500" value="#FF4500">Laranja</option>
                    <option style="color:#8B4513" value="#8B4513">Marrom</option>
                    <option style="color:#1C1C1C" value="#1C1C1C">Preto</option>
                    <option style="color:#436EEE" value="#436EEE">Royal Blue</option>
                    <option style="color:#A020F0" value="#A020F0">Roxo</option>
                    <option style="color:#40E0D0" value="#40E0D0">Turquesa</option>
                    <option style="color:#228B22" value="#228B22">Verde</option>
                    <option style="color:#8B0000" value="#8B0000">Vermelho</option>
                  </select>
                </div>

              </div>

              <button type="submit" name="btnCadEvento" class="btn btn-sucess" id="btnCadEvento">Cadastrar</button>

            </form>
          </div>

        </div>
      </div>
    </div>

  </body>

<!-- Bootstrap5 js -->
  <script src='js/bootstrap.bundle.min.js'></script>

<!-- FullCalendar js -->
  <script src='fullcalendar-6.1.9/dist/index.global.js'></script>
  <script src='fullcalendar-6.1.9/packages/core/locales-all.global.min.js'></script>
  <script src='fullcalendar-6.1.9/packages/bootstrap5/index.global.js'></script>
    
  <script>
    // Executar quando o documento HTM for completamente carregado execute a função 
    document.addEventListener('DOMContentLoaded', function() {

      // Receber o SELETOR calendar do atributo id
      var calendarEl = document.getElementById('calendar');

      // Instanciar FullCalendar.Calendar e atribuir a variável 'calendar' envia para o html
      var calendar = new FullCalendar.Calendar(calendarEl, {

        // Inclur  o Bootstrap 5
        themeSystem: 'bootstrap5',

        initialView: 'dayGridMonth',

        // Definir o idioma usado no calendário
        locale: 'pt-br',

        // Criar o cabeçalho do calendário.
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },

        // Defini data inicial
        //initialDate: '2023-01-12',

        // Permitir clicar nos nomes dos ias da semana
        navLinks: true, // can click day/week names to navigate views

        // Permitir clicar e arrastar o mouse sobre um ou vários dias no calendário.
        selectable: true,

        // Indicar visualmente a área que será selecionada antes que o usuário solte o botão do mouse para confirmar a seleção.
        selectMirror: true,

        /* 
        
        Função que cria o alerta em javascript quando seleciona dias para criar evento.

        select: function(arg) {
          var title = prompt('Event Title:');
          if (title) {
            calendar.addEvent({
              title: title,
              start: arg.start,
              end: arg.end,
              allDay: arg.allDay
            })
          }
          calendar.unselect()
        },

        eventClick: function(arg) {
          if (confirm('Are you sure you want to delete this event?')) {
            arg.event.remove()
          }
        },

        */
        
        // Permitir arrastar e dimensionar os eventos diretamente no calendário.
        editable: true,

        // Número máximo de eventos em um determinado dia, se for true, o número de eventos será limitado à altura da célula do dia.
        dayMaxEvents: true, // allow "more" link when too many events

        // Buscar eventos do banco de dados pode ser usdo para solicitar de API
        // Chamar o arquivo PHP para recuperar os ebentos
        events: 'listar_eventos.php',

        // Identificar o clique do usuário sobre o evento.
        eventClick: function(info){
          // Receber o SELETOR da janela modal visualizar instanciando o bootstrap inicialmente passando como parâmetro o id do seletor do modal.
          // Atribui para uma constante pr não ser alterado
          const visualizarModal = new bootstrap.Modal(document.getElementById("visualizarModal"));
          // Enviar para a janela adiciona o innerText para apresentar o texto e info para setar a função adicionando toLocaleString para converter o date para o padrão
          document.getElementById("visualizar_id").innerText = info.event.id;
          document.getElementById("visualizar_title").innerText = info.event.title;
          document.getElementById("visualizar_start").innerText = info.event.start.toLocaleString();
          document.getElementById("visualizar_end").innerText = info.event.end.toLocaleString();

          // Abrir a janela modal
          visualizarModal.show();
        },
        // Abrir a janela modal cadastrar quando clicar sobre o dia do calendário
        select: function(info){
          console.log(info);

          // Receber o seletor da janela modal
          const cadastrarModal = new bootstrap.Modal(document.getElementById("cadastrarModal"));

          document.getElementById("cad_start").value = converterData(info.start);

          //Este método é acrescentado +1 dia no campo select data
          //document.getElementById("cad_end").value = converterData(info.end);
          //Este método é apresentado o mesmo dia no campo select data

          document.getElementById("cad_end").value = converterData(info.start);



          // Abrir a janela modal cadastrar
          cadastrarModal.show();


        }

  /* eventos estáticos
        events: [

          {
            title: 'All Day Event',
            start: '2023-01-01'
          },
          {
            title: 'Long Event',
            start: '2023-01-07',
            end: '2023-01-10'
          },
          {
            groupId: 999,
            title: 'Repeating Event',
            start: '2023-01-09T16:00:00'
          },
          {
            groupId: 999,
            title: 'Repeating Event',
            start: '2023-01-16T16:00:00'
          },
          {
            title: 'Conference',
            start: '2023-01-11',
            end: '2023-01-13'
          },
          {
            title: 'Meeting',
            start: '2023-01-12T10:30:00',
            end: '2023-01-12T12:30:00'
          },
          {
            title: 'Lunch',
            start: '2023-01-12T12:00:00'
          },
          {
            title: 'Meeting',
            start: '2023-01-12T14:30:00'
          },
          {
            title: 'Happy Hour',
            start: '2023-01-12T17:30:00'
          },
          {
            title: 'Dinner',
            start: '2023-01-12T20:00:00'
          },
          {
            title: 'Birthday Party',
            start: '2023-01-13T07:00:00'
          },
          {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: '2023-01-28'
          }
        ]

        */
  
      });

      // Converte a data
      function converterData(data){
        //Converter a string em um objeto Date
        const dataObj = new Date(data);

        // Extrair o ano da data
        const ano = dataObj.getFullYear();

        // Obter o mês, mês começa de 0, padStart adiciona zeros à esquerda para garantir que o mÊs tenha digitos.
        const mes = String(dataObj.getMonth() +1).padStart(2,'0');

        // Obter o dia e mês, padStart adiciona zeros à esquerda para garantir que  dia tenha dois dígitos.
        const dia = String(dataObj.getDate()).padStart(2, '0');

        // Obter a hora, padStart adiciona zertos À esquerda para garantir que a hora tenha dois digitos.
        const hora = String(dataObj.getHours()).padStart(2, '0');

        // Obter minuto, padStrat adiciona zeros à esquerda para garantir que o minuto tenha dois dígitos.
        const minuto = String(dataObj.getMinutes()).padStart(2, '0');

        // Retornar a data
        return `${ano}-${mes}-${dia} ${hora}:${minuto}`;
      }

      // Recebe o SELETOR do formulario cadastrar evento
      const formCadEvento = document.getElementById("formCadEvento");

        // Somente acessa o IF quando existir o SELETOR "formCadEvento 
        if(formCadEvento){

          //Aguardar o usuario clicar no botão
          formCadEvento.addEventListener("submit", async (e) => {
              // Não permitir a atualização da pagina
              e.preventDefault();

              // Receber os dados do formulario
              const dadosForm = new FormData(formCadEvento);

              // Chamar o arquivo PHP responsável e salvar o evento
              const dados = await fetch("cadastrar_evento.php", {
                method: "POST",
                body: dadosForm
              });

              // Realizar a leiturados dados retornados pelo PHP
              const resposta = await dados.json();
              console.log(resposta);

          });

        } 

      // Renderiza o calendario
      calendar.render();
    });
  </script>

</html>