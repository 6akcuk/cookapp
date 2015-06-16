<?php namespace App\Http\Controllers\Cook;

use App\Commands\Cook\CreateProcessCommand;
use App\Commands\Cook\UpdateProcessCommand;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cook\CreateProcessRequest;
use App\Http\Requests\Cook\UpdateProcessRequest;
use App\Models\Cook\Process;
use App\Models\Cook\Product;

class ProcessesController extends Controller {

  public function index(Product $product) {
    $this->authorize('read', $product);

    $processes = Process::whereProductId($product->id)->get();
    $processesTotal = Process::whereProductId($product->id)->count();

    return view('cook.processes.index', compact('product', 'processes', 'processesTotal'));
  }

  public function create(Product $product) {
    $this->authorize('create', 'App\Models\Cook\Process');

    return view('cook.processes.create', compact('product'));
  }

  public function store(Product $product, CreateProcessRequest $request) {
    $this->authorize('create', 'App\Models\Cook\Process');

    $product_id = $product->id;
    $this->dispatchFrom(CreateProcessCommand::class, $request, compact('product_id'));

    flash()->success('Вид обработки успешно добавлен.');
    return redirect(route('processes.index', $product));
  }

  public function edit($id) {
    $process = Process::findOrFail($id);
    $product = $process->product;

    $this->authorize('update', $process);

    return view('cook.processes.edit', compact('process', 'product'));
  }

  public function update($id, UpdateProcessRequest $request) {
    $this->dispatchFrom(UpdateProcessCommand::class, $request, compact('id'));

    flash()->success('Изменения успешно сохранены.');
    return redirect(route('processes.index', Process::findOrFail($id)->product));
  }

  public function destroy($id) {
    $process = Process::findOrFail($id);
    $process->delete();

    flash()->success('Вид обработки успешно удален.');
    return redirect(route('processes.index', $process->product));
  }
}