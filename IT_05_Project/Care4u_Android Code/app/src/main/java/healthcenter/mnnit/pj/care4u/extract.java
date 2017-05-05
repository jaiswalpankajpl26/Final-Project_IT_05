package healthcenter.mnnit.pj.care4u;

//**

import android.app.AlertDialog;
import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.os.AsyncTask;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.io.StringReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;


public class extract extends AsyncTask<String,Void,String> {
    AlertDialog alertDialog;
    private Dialog loadingDialog;
    private final Context dialog;
    private String med;
    Context ctx;
    String stock;
    String response = "";
    extract(Context ctx)
    {
        this.ctx =ctx;
        this.dialog = ctx;

    }
    @Override
    protected void onPreExecute() {
        alertDialog = new AlertDialog.Builder(ctx).create();
        //alertDialog.setTitle("Login Information....");

        //super.onPreExecute();

        loadingDialog= ProgressDialog.show(ctx, "Please wait", "loading....");



    }
    @Override
    protected String doInBackground(String... params) {

      //String login_url = "http://hc.mnnit.ac.in/care4u/extract.php";
       String login_url = "http://172.31.101.223/newhc/care4u/extract.php";

        med = params[0];


        try {

            // Obtain a new HttpURLConnection by calling URL.openConnection() and casting the result to HttpURLConnection

            URL url = new URL(login_url);
            HttpURLConnection httpURLConnection = (HttpURLConnection)url.openConnection();


            httpURLConnection.setReadTimeout(10000 /* milliseconds */);
            httpURLConnection.setConnectTimeout(15000 /* milliseconds */);

            httpURLConnection.setRequestMethod("POST");
            httpURLConnection.setDoOutput(true);
            httpURLConnection.setDoInput(true);

            //Transmit data by writing to the stream returned by getOutputStream().

            OutputStream outputStream = httpURLConnection.getOutputStream();
            BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream,"UTF-8"));
            String data = URLEncoder.encode("med", "UTF-8")+"="+URLEncoder.encode(med,"UTF-8");
            bufferedWriter.write(data);
            bufferedWriter.flush();
            bufferedWriter.close();
            outputStream.close();

            // The response body may be read from the stream returned by getInputStream().
            // If the response has no body, that method returns an empty stream.

            InputStream inputStream = httpURLConnection.getInputStream();

            //The input and output streams returned by this class are not buffered.
            // Most callers should wrap the returned streams with BufferedInputStream or BufferedOutputStream.
            // Callers that do only bulk reads or writes may omit buffering.


            BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream,"iso-8859-1"));
            // String response = "";
            String line = "";
            while ((line = bufferedReader.readLine())!=null)
            {
                response+= line;
            }
            bufferedReader.close();
            inputStream.close();
            httpURLConnection.disconnect();
            return response;
        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }

        return response;
    }
    @Override
    protected void onProgressUpdate(Void... values) {
        super.onProgressUpdate(values);
    }
    @Override
    protected void onPostExecute(String result) {
        //String s=result.trim();
        //alertDialog.dismiss();
        loadingDialog.dismiss();
        AlertDialog.Builder helpBuilder = new AlertDialog.Builder(ctx);

        // Toast.makeText(ctx, result, Toast.LENGTH_LONG).show();

        int count=0;
        String  success="" ;
        //String stock="";
        int stock=0;
        String value="";
        String userid="";

        try {
            // JSONObject jsonObject = new JSONObject(result);


            // success = jsonObject.getInt("success");
            // stock=jsonObject.getString("stock");
            JSONArray jasonarray = new JSONArray(result);


            // while (count < jasonarray.length()) {
            JSONObject JO = jasonarray.getJSONObject(count);
            //success = JO.getInt("success");
        success=JO.getString("success");
        } catch (JSONException e) {
            e.printStackTrace();
        //    Toast.makeText(ctx, e.toString(), Toast.LENGTH_LONG).show();
        }



        helpBuilder.setTitle("Meicine Stocks");
        if (success.matches("1"))
        {
            int avail=0;
            int total=0;
            int i=0;
            try
            {
                JSONArray jasonarray = new JSONArray(result);
                //JSONObject JO = jasonarray.getJSONObject(0);
                //stock = JO.getString("stock");
                while (i < jasonarray.length()) {
                    JSONObject JO = jasonarray.getJSONObject(i);
                    // success = JO.getInt("success");
                   total=Integer.parseInt(JO.getString("total"));
                    avail=Integer.parseInt(JO.getString("avail"));

                    //  Toast.makeText(this,name,Toast.LENGTH_LONG).show();

                    i++;
                }
                if(total==0)
                {
                   if(avail==0)
                    helpBuilder.setMessage(med+" Not Available\n");
                    else
                       helpBuilder.setMessage(med+" Stocks not available with the Pharmacists\n"+avail+" Stocks availabe in the Dispensary\n");
                }
                else
                {
                    try {
                        jasonarray = new JSONArray(result);
                        //JSONObject JO = jasonarray.getJSONObject(0);
                        //stock = JO.getString("stock");
                        while (count < jasonarray.length()) {
                            JSONObject JO = jasonarray.getJSONObject(count);
                            // success = JO.getInt("success");
                            stock =Integer.parseInt( JO.getString("stock"));
                            userid=JO.getString("userid");
                            value+=userid+":    "+stock+"\n";
                            //  Toast.makeText(this,name,Toast.LENGTH_LONG).show();

                            count++;
                        }
                        //
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                    helpBuilder.setMessage("Medicine:" + med + "\n"+value);
                }

            }
            catch (JSONException e)
            {
                e.printStackTrace();
            }



          //  Toast.makeText(ctx,String.valueOf(stock), Toast.LENGTH_LONG).show();
            //alertDialog.setMessage(stock);

            //  helpBuilder.setTitle("Meicine Stocks");
           /* helpBuilder.setMessage("Medicine:" + med + "\nStock:" + stock);
            helpBuilder.setPositiveButton("Ok",
                    new DialogInterface.OnClickListener() {

                        public void onClick(DialogInterface dialog, int which) {
                            // Do nothing but close the dialog
                        }
                    });

            // Remember, create doesn't show the dialog
            AlertDialog helpDialog = helpBuilder.create();
            helpDialog.show();*/

        }
        else
        {
           helpBuilder.setMessage("Wrong Medicine Name");
            //helpBuilder.setMessage(result);
            //alertDialog.setMessage(stock);
            //alertDialog.show();


            // Toast.makeText(ctx, result, Toast.LENGTH_LONG).show();

        }

        helpBuilder.setPositiveButton("Ok",
                new DialogInterface.OnClickListener() {

                    public void onClick(DialogInterface dialog, int which) {
                        // Do nothing but close the dialog
                    }
                });

        // Remember, create doesn't show the dialog
        AlertDialog helpDialog = helpBuilder.create();
        helpDialog.show();
    }
}
