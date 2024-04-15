<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    use HasFactory;

    /**
     * Các trường trong bảng 'cvs'
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'address',
        'job_title',
        'summary',
        'education',
        'experience',
        'skills',
    ];

    /**
     * Quan hệ 1-n với User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Lấy tên người viết CV
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->attributes['full_name'];
    }

    /**
     * Lấy địa chỉ email của người viết CV
     *
     * @return string
     */
    public function getEmailAttribute()
    {
        return $this->attributes['email'];
    }

    /**
     * Lấy số điện thoại của người viết CV
     *
     * @return string
     */
    public function getPhoneNumberAttribute()
    {
        return $this->attributes['phone_number'];
    }

    /**
     * Lấy địa chỉ của người viết CV
     *
     * @return string
     */
    public function getAddressAttribute()
    {
        return $this->attributes['address'];
    }

    /**
     * Lấy chức danh công việc mục tiêu
     *
     * @return string
     */
    public function getJobTitleAttribute()
    {
        return $this->attributes['job_title'];
    }

    /**
     * Lấy mô tả ngắn gọn về bản thân và mục tiêu nghề nghiệp
     *
     * @return string
     */
    public function getSummaryAttribute()
    {
        return $this->attributes['summary'];
    }

    /**
     * Lấy thông tin về học vấn
     *
     * @return string
     */
    public function getEducationAttribute()
    {
        return $this->attributes['education'];
    }

    /**
     * Lấy thông tin về kinh nghiệm làm việc trước đây
     *
     * @return string
     */
    public function getExperienceAttribute()
    {
        return $this->attributes['experience'];
    }

    /**
     * Lấy danh sách kỹ năng của người viết CV
     *
     * @return array
     */
    public function getSkillsAttribute()
    {
        return json_decode($this->attributes['skills'], true);
    }

    /**
     * Thiết lập danh sách kỹ năng của người viết CV
     *
     * @param array $skills
     * @return void
     */
    public function setSkillsAttribute($skills)
    {
        $this->attributes['skills'] = json_encode($skills);
    }
}
