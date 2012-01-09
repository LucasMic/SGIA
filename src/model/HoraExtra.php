<?php
/**
 * Classe HoraExtra
 * @package model
 * @author Idealizza
 */
	class HoraExtra {
		
		/**
		 * Atributos
		 */		
		private $id;
		private $data;
		private $pendentes;
		private $pagas;
		private $colaborador;
        private $tipoHoraExtra;
		

		public function __construct($id = 0, $data = "", $pendentes = "", $pagas = "", Colaborador $colaborador = null, TipoHoraExtra $tipoHoraExtra = null){
			$this->id = $id;
			$this->data = $data;
			$this->pendentes = $pendentes;
			$this->pagas = $pagas;
			$this->colaborador = $colaborador;
            $this->tipoHoraExtra = $tipoHoraExtra;
			
		}
		
		public function inserir(){
			// validando os campos //
			$instancia = HoraExtraDAO::getInstancia();
			// executando o metodo //
			$horaExtra = $instancia->inserir($this);
			// retornando o Pagamento //
			return $horaExtra;
		}
		
		public static function listar($idColaborador){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = HoraExtraDAO::getInstancia();
			// executando o metodo //
			$horaExtras = $instancia->listar($idColaborador);
			// checando se o retorno foi falso //
			if(!$horaExtras)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::HORAEXTRA);
			// percorrendo os usuarios //
			foreach($horaExtras as $horaExtra){
				// instanciando e jogando dentro da colecao $objetos o Pagamento //
				$objetos[] = new HoraExtra($horaExtra['id'], $horaExtra['data'], $horaExtra['pendentes'], $horaExtra["pagas"], Colaborador::buscar($horaExtra["colaboradores_id"]), TipoHoraExtra::buscar($horaExtra["tipo_hora_extra_id"]));
			}
			// retornando a colecao $objetos //
			return $objetos;
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
		public function getData(){
			return $this->data;
		}
		public function setData($data){
			$this->data = $data;
		}
		public function getPendentes(){
			return $this->pendentes;
		}
		public function setPendentes($pendentes){
			$this->pendentes = $pendentes;
		}
		public function getPagas(){
			return $this->pagas;
		}
		public function setPagas($pagas){
			$this->pagas = $pagas;
		}
		
		public function getColaborador(){
			return $this->colaborador;
		}
		public function setColaborador(Colaborador $colaborador){
			$this->colaborador = $colaborador;
		}

       public function getTipoHoraExtra(){
           return $this->tipoHoraExtra;
       }

       public function setTipoHoraExtra(TipoHoraExtra $tipoHoraExtra){
           $this->tipoHoraExtra = $tipoHoraExtra;
       }

	}
?>