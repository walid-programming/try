<?php

namespace App\Console;

use App\Repositories\ProductRepository;
use Illuminate\Console\Command;

class ProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ycc make:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new product';

    /**
     * Execute the console command.
     *
     * @return void
     */
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function handle()
    {
        $this->comment('Create new product...');
        $data = ['name' => 'test','description' => 'test','price' => '12','image' => ''];
        $this->productRepository->createProduct($data);
        $this->info('product was created successfully.');
    }
}
