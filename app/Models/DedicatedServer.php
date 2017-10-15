<?php

namespace Gameap\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class DedicatedServer
 *
 * @property int $id
 * @property boolean $enabled
 * @property string $name
 * @property string $os
 * @property string $location
 * @property string $provider
 * @property string $ip
 * @property string $ram
 * @property string $cpu
 * @property string $work_path
 * @property string $steamcmd_path
 * @property string $gdaemon_host
 * @property string $gdaemon_login
 * @property string $gdaemon_password
 * @property string $gdaemon_privkey
 * @property string $gdaemon_pubkey
 * @property string $gdaemon_keypass
 * @property string $script_start
 * @property string $script_stop
 * @property string $script_restart
 * @property string $script_status
 * @property string $script_get_console`
 * @property string $script_send_command
 * @property string $created_at
 * @property string $updated_at
 */
class DedicatedServer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'enabled', 'name', 'os',
        'location', 'provider', 'ip',
        'ram', 'cpu', 'work_path',
        'steamcmd_path', 'gdaemon_host',
        'gdaemon_login', 'gdaemon_password',
        'gdaemon_privkey', 'gdaemon_pubkey',
        'gdaemon_keypass', 'script_start',
        'script_stop', 'script_restart',
        'script_status', 'script_get_console',
        'script_send_command'
    ];

    protected $casts = [
        'ip' => 'array',
    ];

    /**
     * One to many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servers()
    {
        return $this->hasMany(Server::class, 'ds_id');
    }
}