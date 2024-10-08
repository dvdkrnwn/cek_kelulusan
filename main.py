# api_knn_with_scaler.py
import joblib # type: ignore
from flask import Flask, request, jsonify # type: ignore
import numpy as np # type: ignore

# Load the saved KNN model and scaler
model = joblib.load('models/knn_best_6_input3_98_.joblib')
scaler = joblib.load('models/scaler_best_6_input3_98_.joblib')

api_set_key = 'Application: gG1TSp5iVTIbTIzvgpH4ve830IeNrHpExsCc2kib8JySbrN4rmLIzOVELDSuV4qgF78ns3b4HzttTzLClE9oOu4bSm61vtlUcBvTgwmxzJjXla7YenpZtgimcraEIEVJ'
# Create the Flask app
app = Flask(__name__)


# Define a route to make predictions
@app.route('/predict', methods=['POST'])
def predict():

    auth_header = request.headers.get('Authorization')
    if not auth_header or not auth_header.startswith('Bearer '):
        return jsonify({
            'code': 401,
            'status': 'Unauthorized',
            'message': 'Please provide your Bearer token.'
        }), 401

    # Extract the token
    token = 'Application: '+auth_header.split(" ")[2]
    if token != api_set_key:
        return jsonify({
            'code': 401,
            'status': 'Unauthorized',
            'message': 'Invalid token provided.'
        }), 401

    try:
        # Get the input data from the request in JSON format
        data = request.json
        ips_1 = data['ips_1']
        ips_2 = data['ips_2']
        ips_3 = data['ips_3']
        ips_4 = [3.777813, 3.777813, 3.777813]
        ips_5 = [3.800000, 3.800000, 3.800000]  # Kolom yang kosong
        ips_6 = [3.779849, 3.779849, 3.779849]

        input_data = [[ ips_1, ips_2, ips_3, ips_4[0], ips_5[0], ips_6[0]]]

        # Apply the scaler to the input data
        input_array_scaled = scaler.transform(input_data)

        # Make predictions using the scaled data
        prediction = model.predict(input_array_scaled)
        prediction_proba = model.predict_proba(input_array_scaled)

        # Return the prediction as a JSON response
        # return jsonify({
        #     'prediction': prediction.tolist(),
        #     'prediction_proba': prediction_proba.tolist()
        # })
    
        return jsonify({
            'code': 201,
            'status': 'Created' ,
            'data' : prediction.tolist()[0],
        }), 201

    except Exception as e:
        return jsonify({'error': str(e)})

# Run the Flask app
if __name__ == '__main__':
    app.run(debug=True, port=5555)
