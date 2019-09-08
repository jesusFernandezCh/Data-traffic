<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Distributor;
use App\Mail\PasswordEmail;
use Illuminate\Support\Facades\Mail;

class ChangePassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:changePassword';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change password of the Distributors and send email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $distributors = Distributor::all();

        foreach ($distributors as $distributor) {
            $password = bycrip(str_random(8));//genered new password
            $stmt = Distributor::find($distributor->id);
            $stmt->update(['password' => $password])->save();//update password
            Mail::to($distributor->email)->send(new PasswordEmail($stmt));
        }

        $this->info('Passwords de Distribuidores actualizados Correctamente !');
    }
}
