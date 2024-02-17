<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NodeRedData;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Process\Process;
use Illuminate\Http\Response;//borrar luego
use Illuminate\Support\Facades\Log;//tambien borrar

class NodeRedController extends Controller
{
    protected $temperatura='', $voltaje='', $distancia='', $intensidad='';

    function extraerValorNumerico($cadena)
    {
        return floatval(preg_replace('/[^0-9.]/', '', $cadena));
    }

    public function guardarDatos()
    {
        $temperaturaValue = $this->extraerValorNumerico($this->temperatura);
        $voltageValue = $this->extraerValorNumerico($this->voltaje);
        $distanciaValue = $this->extraerValorNumerico($this->distancia);
        $intensidadValue = $this->extraerValorNumerico($this->intensidad);
        // Busca un registro existente en la base de datos
        $registroExistente = NodeRedData::first();

        // Si existe un registro, actualiza sus datos; sino crea uno nuevo
        if ($registroExistente) {
            $registroExistente->update([
                'temperature' => $temperaturaValue,
                'voltage' => $voltageValue,
                'luminosity' => $intensidadValue,
                'proximity' => $distanciaValue,
            ]);
        } else {
            NodeRedData::create([
                'temperature' => $temperaturaValue,
                'voltage' => $voltageValue,
                'luminosity' => $intensidadValue,
                'proximity' => $distanciaValue,
            ]);
        }
    }   

    public function procesarDatos()
    {
        $msg='';
        $server   = '127.0.0.1';
        $port     = 1883;
        $clientId = 'cliente-subscriber';

        $mqtt = new \PhpMqtt\Client\MqttClient($server, $port, $clientId);
        $connectionSettings = (new \PhpMqtt\Client\ConnectionSettings)
        ->setConnectTimeout(2)
        ->setUsername("cliente")
        ->setPassword("untcliente24");
        $mqtt->connect($connectionSettings, true);
        $mqtt->subscribe('temperatura', function ($topic, $message, $retained, $matchedWildcards) use ($mqtt) {
            $this->SetTemperatura($message);
            $mqtt->interrupt();
        }, 1);
        $mqtt->loop(true);
        $mqtt->subscribe('voltaje', function ($topic, $message, $retained, $matchedWildcards) use ($mqtt) {
            $this->SetVoltaje($message);
            $mqtt->interrupt();
        }, 1);
        $mqtt->loop(true);
        $mqtt->subscribe('intensidad', function ($topic, $message, $retained, $matchedWildcards) use ($mqtt) {
            $this->SetIntensidad($message);
            $mqtt->interrupt();
        }, 1);
        $mqtt->loop(true);
        $mqtt->subscribe('distancia', function ($topic, $message, $retained, $matchedWildcards) use ($mqtt) {
            $this->Setdistancia($message);
            $mqtt->interrupt();
        }, 1);
        $mqtt->loop(true);
        $mqtt->disconnect();
    }

    public function SetTemperatura($temp){
        $this->temperatura=$temp;
    }
    public function SetIntensidad($temp){
        $this->intensidad=$temp;
    }
    public function SetVoltaje($temp){
        $this->voltaje=$temp;
    }
    public function Setdistancia($temp){
        $this->distancia=$temp;
    }

    public function mostrarDatos(){
        $this->procesarDatos();
        $this->guardarDatos();
        $datos = NodeRedData::first();//estaba en all()
        return response()->json($datos);
        /* return view('index', ['datos' => $datos]); */
    }

    public function mostrarVista(){
        shell_exec("python img\prediccion2.py");
        $temperatura = $this->temperatura;
        $voltaje = $this->voltaje;
        $distancia = $this->distancia;
        $intensidad = $this->intensidad;
        $fechaActual = Carbon::now();
        // Pasa las variables a la vista
        return view('index', compact('temperatura', 'voltaje', 'distancia', 'intensidad','fechaActual'));
    }

    public function comentario(){
        return view('comentario');
    }
}
