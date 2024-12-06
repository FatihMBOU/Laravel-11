<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];



 


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
        public function profile()
        {
          return  $this->HasOne();
        }

        
        public function experience()
        {
            return $this->HasOne(Experience::class);
        }

        public function posts()
        {
            return $this->HasMany(Post::class, 'person_id');

        }
    
        public function jobs()
        {
            return $this->HasMany(Job::class);

        }
    
        public function tasks()
        {
            return $this->HasMany(Task::class);

        }

        public function achievements()
        {
            return $this->HasMany(Achievements::class);

        }

       /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}