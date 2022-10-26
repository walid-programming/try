<?php

namespace App\Console\Commands;

use App\Repositories\ProductRepository;
use Illuminate\Console\Command;

class CreateProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ycc:product {name} {description} {price} {image}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new product';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    private ProductRepository $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        parent::__construct();
        $this->productRepository = $productRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->comment('Create new product...');
        $data = $this->arguments();
        $this->productRepository->createProduct($data);
        $this->info('product was created successfully.');
        $categoryId = $this->ask('Choose category Id?');

    }
}
