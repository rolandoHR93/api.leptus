<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class CreateRepositoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repository:composer {composer}';


    protected $files;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a file PHP Repository and interface composer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        $this->files=$files;
        parent::__construct();
    }

    /**
     * Execute the console command.
     * ☼•⁞⁞∞™©Ωπβαµ∞
     * @return int
     */
    public function handle()
    {
        $viewComposer=$this->argument('composer');

        if ($viewComposer === '' || is_null($viewComposer) || empty($viewComposer)) {
            return $this->error('Composer Name Invalid..!');
        }

        $nameFileInterface = $viewComposer.'Interface';
        $viewComposer = $viewComposer.'Repository';

        $contents = $this->generateContentFileRepository($viewComposer, $nameFileInterface);

        return $this->createFileRepository($nameFileInterface, $viewComposer, $contents);
    }

    private function createFileRepository(string $nameFileInterface, string $viewComposer, string $contents){

        if ($this->confirm('Do you wish to create '.$viewComposer.' Composer file?')) {
            $file = "${viewComposer}.php";
            $path=app_path();

            $file=$path."/Repositories/".pathinfo("${viewComposer}.php")['dirname'].'/'.basename($file);
            $composerDir=$path."/Repositories/".pathinfo("${viewComposer}.php")['dirname'];

            if($this->files->isDirectory($composerDir)){
                if($this->files->isFile($file))
                    return $this->error($viewComposer.' X - File Already exists!');

                if(!$this->files->put($file, $contents))
                    return $this->error('X - Something went wrong!');

                // ---------------------
                $this->info("•••• $viewComposer generated √√√√");
            }
            else{

                $this->files->makeDirectory($composerDir, 0777, true, true);
                if(!$this->files->put($file, $contents))
                    return $this->error('X - Something went wrong!');

                // ---------------------
                $this->info("•••• $viewComposer generated √√√√");

            }

            $contents = $this->generateContentFileInterface($nameFileInterface);
            $this->createFileInterface($nameFileInterface, $contents);
        }
    }

    private function generateContentFileRepository(string $viewComposer, string $nameFileInterface):string{
        $contents=
            '<?php
namespace App\Repositories'.((pathinfo("${viewComposer}.php")['dirname']!= '.')?
'\\'.pathinfo("${viewComposer}.php")['dirname']:'').';

use App\Models\User;
use stdClass;
use DB;

class '.basename($viewComposer).' implements '.basename($nameFileInterface).'
{
    /**
    * Create a new '.$viewComposer.' composer.
    * @return void
    */

    public function search(string $id){

    }
}';
        return $contents;
    }


    private function createFileInterface(string $nameFileInterface, string $contents){

        if ($this->confirm('Do you wish to create '.$nameFileInterface.' Composer file?')) {
            $file = "${nameFileInterface}.php";
            $path=app_path();

            // $file=$path."/Repositories/$file";
            // $composerDir=$path."/Repositories";

            $file=$path."/Repositories/".pathinfo("${nameFileInterface}.php")['dirname'].'/'.basename($file);
            $composerDir=$path."/Repositories/".pathinfo("${nameFileInterface}.php")['dirname'];

            if($this->files->isDirectory($composerDir)){
                if($this->files->isFile($file))
                    return $this->error($nameFileInterface.' X - File Already exists!');

                if(!$this->files->put($file, $contents))
                    return $this->error('X - Something went wrong!');
                $this->info("•••• $nameFileInterface generated √√√√");
            }
            else{
                $this->files->makeDirectory($composerDir, 0777, true, true);

                if(!$this->files->put($file, $contents))
                    return $this->error('X - Something went wrong!');
                $this->info("•••• $nameFileInterface generated √√√√");
            }
        }
    }

    private function generateContentFileInterface(string $nameFileInterface):string{
        $contents=
            '<?php
namespace App\Repositories'.((pathinfo("${nameFileInterface}.php")['dirname']!= '.')?
'\\'.pathinfo("${nameFileInterface}.php")['dirname']:'').';

interface '.basename($nameFileInterface).'
{

    public function search(string $id);

}';
        return $contents;
    }

    public function getRutaArchivo_O_Carpeta()
    {
        $test = basename("Interno/sudoers");
        $partes_ruta = pathinfo('lib.inc.php');

        dd($partes_ruta);
    }
}
