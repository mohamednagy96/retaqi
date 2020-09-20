
<?php

/**
 * @OA\Schema(
 *     description="Some simple request signup student",
 *     type="object",
 *     title=" Student SignIN request",
 * )
 */
class  StudentSignUp
{
    /**
     * @OA\Property(
     *     title="Name",
     *     description="Some text field",
     *     format="string",
     *     example="Ahmed Mohamed"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     title="email",
     *     description="email",
     *     format="string",
     *     example="admin@test.com"
     * )
     *
     * @var string
     */
    public $email;
     /**
     * @OA\Property(
     *     title="date_of_birth",
     *     description="date of birth",
     *     format="date",
     *     example="2017-06-07 09:39:31"
     * )
     *
     * @var string
     */
    public $date_of_birth;
     /**
     * @OA\Property(
     *     title="mobile",
     *     description="mobile",
     *     format="integer",
     *     example="0112345678"
     * )
     *
     * @var integer
     */
    public $mobile;
      /**
     * @OA\Property(
     *     title="gender",
     *     description="select gender (F,M)",
     *     format="string",
     *     example="F"
     * )
     *
     * @var string
     */
    public $gender;
     /**
     * @OA\Property(
     *     title="avaliable_time",
     *     description="enter your available time",
     *     format="string",
     *     example="09:39:31"
     * )
     *
     * @var string
     */
    public $avaliable_time;
    /**
     * @OA\Property(
     *     title="governorate_id",
     *     description="select governorate id",
     *     format="integer",
     *     example=1
     * )
     *
     * @var integer
     */
    public $governorate_id;
     /**
     * @OA\Property(
     *     title="group_id",
     *     description="select group id",
     *     format="integer",
     *     example=1
     * )
     *
     * @var integer
     */
    public $group_id;
    /**
     * @OA\Property(
     *     title="day_id",
     *     description="select day id",
     *     format="integer",
     *     example=1
     * )
     *
     * @var integer
     */
    public $day_id;
     /**
     * @OA\Property(
     *     title="teacher_id",
     *     description="select teacher id",
     *     format="integer",
     *     example=1
     * )
     *
     * @var integer
     */
    public $teacher_id;
     /**
     * @OA\Property(
     *     title="password",
     *     description="select password",
     *     format="string",
     *     example=12345678
     * )
     *
     * @var string
     */
    public $password;
      /**
     * @OA\Property(
     *     title="c_password",
     *     description="confirm password",
     *     format="string",
     *     example=12345678
     * )
     *
     * @var string
     */
    public $c_password;
}