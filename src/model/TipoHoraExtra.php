<?php
/**
 * Classe HoraExtra
 * @package model
 * @author Idealizza
 */
	class TipoHoraExtra {
		
		/**
		 * Atributos
		 */		
		private $id;
		private $valor;
	
		public function __construct($id = 0, $valor = 0){
			$this->id = $id;
			$this->valor = $valor;
			
		}
		
			
		public static function listar(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = HoraExtraDAO::getInstancia();
			// executando o metodo //
			$horaExtras = $instancia->listarTipos();
			// checando se o retorno foi falso //
			if(!$horaExtras)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::HORAEXTRA);
			// percorrendo os usuarios //
			foreach($horaExtras as $horaExtra){
				// instanciando e jogando dentro da colecao $objetos o Pagamento //
				$objetos[] = new TipoHoraExtra($horaExtra['id'], $horaExtra['valor']);
			}
			// retornando a colecao $objetos //
			return $objetos;
		}

        public static function buscar($id){
            $instancia = HoraExtraDAO::getInstancia();
            $horaExtra = $instancia->buscarTipo($id);

            if(!$horaExtra){
                throw new ListaVazia(ListaVazia::HORAEXTRA);
            }

            return new TipoHoraExtra($horaExtra["id"], $horaExtra["valor"]);

        }
		
		
		/**
		 * Metodos getters() e setters()
		 */
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}

        public function getValor(){
            return $this->valor;
        }

        public function setValor($valor){
            $this->valor = $valor;
        }

	}
?>