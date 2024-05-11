<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Helpers\EnvHelper;


class UserController extends Controller
{

    /**
     * @param Request $request
     * @return Application|Factory|View
     *  Retrieve users data from origin and creates/update users in database
     *  Invoke view and returns users json data
     */
    public function getUsers(Request $request)
    {
        $jsonDataArray = $this->consumeUsers($request);

        // Invoke view with data from users
        return view('users.process-results', [
            'processedUsers' => $jsonDataArray->processedUsers,
            'createdUsers' => $jsonDataArray->createdUsers,
            'updatedUsers' => $jsonDataArray->updatedUsers
        ]);
    }


    /**
     * @param Request $request
     * @return mixed
     * Retrieve users data from origin and creates/update users in database
     * Returns users data in json format
     */
    public function consumeUsers(Request $request)
    {
        // Consume API and transform data to JSON
        $apiResponse = $this->consumeAPI();

        //Create and update users in database
        $jsonData = $this->createAndUpdateUsers($apiResponse);

        return $jsonData->getData();
    }

    /**
     * @return JsonResponse|mixed|string
     * Consumes API to obtain users data in JSON format
     */
    private function consumeAPI()
    {
        try{
            //Take API_URL from env
            $apiUrl = EnvHelper::getEnvVar('API_URL');

            try {
                // Create an HTTP request using Laravel's HTTP client
                $response = Http::withoutVerifying()->get($apiUrl); //add security here
            } catch (Exception $e) {
                return  "error: " . $e->getMessage();
            }

            // Check for successful response
            if ($response->successful()) {
                // Get the response body
                $body = $response->body();
                // Transform json
                return json_decode($body);

            } else {
                return response()->json(['error' => 'Failed to fetch data from API'], $response->status());
            }

        } catch (Exception $exception) {
            report($exception);
            return response()->json(['error' => 'Something went wrong during data request to origin'], 500);
        }

    }


    /**
     * @param $jsonData
     * @return JsonResponse
     * Creates and updates users data in DB.
     * Returns processed, created and updated users in JSON format
     */
    private function createAndUpdateUsers($jsonData): \Illuminate\Http\JsonResponse
    {
        $createdUsers = []; // Array to store updated user
        $updatedUsers = []; // Array to store created user

        foreach ($jsonData as $userData) {
            try {
                //Verify create or update, searching for users uid
                $user = User::updateOrCreate(['uid' => $userData->uid], (array) $userData);

                // Determine if created or updated (to show status)
                if (!$user->exists) {
                    $createdUsers[] = $userData;
                } else {
                    $updatedUsers[] = $userData;
                }

                // Extract data from user (JSON)
                $employmentData = $userData->employment;
                $addressData = $userData->address;
                $creditCardData = $userData->credit_card;
                $subscriptionData = $userData->subscription;

                // Handle Employment
                if ($employmentData) {
                    $employment = $user->employment()->updateOrCreate([], (array) $employmentData);
                }

                // Handle Address
                if ($addressData) {
                    $addressData->lat = $addressData->coordinates->lat;
                    $addressData->lng = $addressData->coordinates->lng;

                    $address = $user->address()->updateOrCreate([], (array) $addressData);
                }

                // Handle Credit Card
                if ($creditCardData) {
                    $creditCard = $user->creditCard()->updateOrCreate([], (array) $creditCardData);
                }

                // Handle Subscription
                if ($subscriptionData) {
                    $subscription = $user->subscription()->updateOrCreate([], (array) $subscriptionData);
                }

            } catch (Exception $exception) {
                report($exception); // Log the error
                $errorMessage = 'Something went wrong during user data processing';
                if (method_exists($exception, 'getMessage')) {
                    $errorMessage .= ': ' . $exception->getMessage();
                }
                return response()->json(['error' => $errorMessage], 500);
            }
        }

        // Return processed users, including created and updated user ID
        return response()->json([
            'processedUsers' => $jsonData,
            'createdUsers' => $createdUsers,
            'updatedUsers' => $updatedUsers
        ]);
    }


}

