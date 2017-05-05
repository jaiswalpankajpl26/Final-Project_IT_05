package healthcenter.mnnit.pj.care4u;

import android.app.AlertDialog;
import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.ContentResolver;
import android.content.ContentUris;
import android.content.ContentValues;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.net.Uri;
import android.os.AsyncTask;
import android.provider.CalendarContract;
import android.util.Log;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;
import java.util.Calendar;

/**
 * Created by alok saxena on 01-03-2016.
 */
public class bg_finalappoint extends AsyncTask<String,Void,String> {

    String date, dname, dtime, regno,dtask,special;
    private Dialog loadingDialog;
    AlertDialog alertDialog;
    static long eventID=0;
    //private Dialog loadingDialog;

    Context ctx;

    bg_finalappoint(Context ctx) {
        this.ctx = ctx;
    }

    @Override
    protected void onPreExecute() {
        super.onPreExecute();
        loadingDialog = ProgressDialog.show(ctx, "Please wait", "loading....");
    }

    @Override
    protected String doInBackground(String... params) {
       String login_url = "http://hc.mnnit.ac.in/care4u/finalappoint.php";
         //String login_url = "http://210.212.49.25/care4u/finalappoint.php";
        dname = params[0];
        date = params[1];
        dtime = params[2];
        regno = params[3];
        dtask=params[4];
        special=params[5];

        try {
            URL url = new URL(login_url);

            HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
            httpURLConnection.setReadTimeout(15000);
            httpURLConnection.setConnectTimeout(15000);

            httpURLConnection.setRequestMethod("POST");
            httpURLConnection.setDoOutput(true);
            httpURLConnection.setDoInput(true);
            OutputStream outputStream = httpURLConnection.getOutputStream();
            BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream, "UTF-8"));
            String data = URLEncoder.encode("dname", "UTF-8") + "=" + URLEncoder.encode(dname, "UTF-8") + "&" +
                    URLEncoder.encode("date", "UTF-8") + "=" + URLEncoder.encode(date, "UTF-8") + "&" +
                    URLEncoder.encode("dtime", "UTF-8") + "=" + URLEncoder.encode(dtime, "UTF-8") + "&" +
                    URLEncoder.encode("regno", "UTF-8") + "=" + URLEncoder.encode(regno, "UTF-8")+"&"+
                    URLEncoder.encode("dtask", "UTF-8") + "=" + URLEncoder.encode(dtask, "UTF-8")+"&"+
                    URLEncoder.encode("special", "UTF-8") + "=" + URLEncoder.encode(special, "UTF-8");
            bufferedWriter.write(data);
            bufferedWriter.flush();
            bufferedWriter.close();
            outputStream.close();
            InputStream inputStream = httpURLConnection.getInputStream();
            BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream, "iso-8859-1"));
            //String response = "";
            String line;
            StringBuilder res = new StringBuilder();
            while ((line = bufferedReader.readLine()) != null) {
                res.append(line + "\n");
            }
            bufferedReader.close();
            inputStream.close();
            httpURLConnection.disconnect();
            return res.toString().trim();
        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }

        return null;
    }

    @Override
    protected void onProgressUpdate(Void... values) {
        super.onProgressUpdate(values);
    }
    @Override
    protected void onPostExecute(String result)
    {
        //  Toast.makeText(ctx,s,Toast.LENGTH_LONG).show();
        loadingDialog.dismiss();
        if (result.matches("true"))
        {
            //Toast.makeText(ctx, "Successfully appointed", Toast.LENGTH_LONG).show();
            // alertDialog.setMessage(result);
            // alertDialog.show();

            AlertDialog.Builder builder = new AlertDialog.Builder(ctx);

            builder.setMessage("Successfully appointed!").setCancelable(false)
                    .setPositiveButton("OK", new DialogInterface.OnClickListener() {
                        public void onClick(DialogInterface dialog, int id) {
                            Calendar beginCal = Calendar.getInstance();
                            int day = 0, year = 0, mth = 0;
                            int starthour = 0,endhour=0;
                            try {
								//change start
								String [] dateParts = date.split("/");
								String dstring = dateParts[2];
								String mstring = dateParts[1];
								String ystring = dateParts[0];
                                String [] time= dtime.split(" ");
                                String stime=time[0];
                                String etime=time[2];
                               // Toast.makeText(ctx, stime, Toast.LENGTH_LONG).show();
                                //Toast.makeText(ctx, etime, Toast.LENGTH_LONG).show();
                                String shour="";
                                String ehour="";
                                int i=0;
                                while (stime.charAt(i)!='.') {
                                    shour += stime.charAt(i);
                                    i++;
                                }
                                i=0;
                                while (etime.charAt(i)!='.') {
                                    ehour += etime.charAt(i);
                                    i++;
                                }
                                starthour=Integer.parseInt(shour);
                                endhour=Integer.parseInt(ehour);

                               // Toast.makeText(ctx, sparts[1], Toast.LENGTH_LONG).show();
                               // Toast.makeText(ctx, eparts[1], Toast.LENGTH_LONG).show();
                                //starthour=Integer.parseInt(sparts[0]);
                                //endhour=Integer.parseInt(eparts[0]);
								 year = Integer.parseInt(ystring);
                                mth = Integer.parseInt(mstring);
                                day = Integer.parseInt(dstring);
								//change end 
                                //year = Integer.parseInt(date.substring(0, 3));
                                //mth = Integer.parseInt(date.substring(5, 6));
                                //day = Integer.parseInt(date.substring(8, 9));
								
                        
                            } catch (NumberFormatException nfe) {
                                Toast.makeText(ctx, "Error in date conversion", Toast.LENGTH_LONG).show();
                            }
						    beginCal.set(Calendar.YEAR, year);
                            beginCal.set(Calendar.MONTH, mth - 1);
                            beginCal.set(Calendar.DAY_OF_MONTH, day);
                            beginCal.set(Calendar.HOUR_OF_DAY,starthour );
                            beginCal.set(Calendar.MINUTE, 01);
                            beginCal.set(Calendar.SECOND, 0);
                            //startTime = beginCal.getTimeInMillis();

                            Calendar endCal = Calendar.getInstance();
                            endCal.set(Calendar.YEAR, year);
                            endCal.set(Calendar.MONTH, mth - 1);
                            endCal.set(Calendar.DAY_OF_MONTH, day + 1);
                            endCal.set(Calendar.HOUR_OF_DAY, endhour);
                            endCal.set(Calendar.MINUTE, 10);
                            endCal.set(Calendar.SECOND, 0);
                            //endTime = endCal.getTimeInMillis();

                            Intent intent = new Intent(Intent.ACTION_INSERT);
                            //Intent intent = new Intent(Intent.ACTION_EDIT);
                            intent.setType("vnd.android.cursor.item/event");
                            intent.putExtra(CalendarContract.Events.TITLE, "Doctor Appointment");
                            intent.putExtra(CalendarContract.Events.DESCRIPTION, "Doctor Name:"+dname+"\n"+"Specialization :"+special+"\nAppointment Card No :"+regno.toString());
                            intent.putExtra(CalendarContract.Events.EVENT_LOCATION, "");
                            intent.putExtra(CalendarContract.EXTRA_EVENT_BEGIN_TIME, beginCal.getTimeInMillis());
                            intent.putExtra(CalendarContract.EXTRA_EVENT_END_TIME, endCal.getTimeInMillis());
                            intent.putExtra(CalendarContract.Events.ALL_DAY, 1);
                            intent.putExtra(CalendarContract.Events.STATUS, 1);
                            intent.putExtra(CalendarContract.Events.VISIBLE, 3);
                            //stat change
                            //intent.putExtra(CalendarContract.Events._ID,eventID);
                            //eventID++;
                           // ContentValues contentEvent = new ContentValues();
                           // Uri eventsUri = Uri.parse("content://com.android.calendar/events");

                            intent.putExtra(CalendarContract.Events.CALENDAR_ID, 1);
                           // long eventID = Long.parseLong(eventsUri.getLastPathSegment());

                            //end change
                            intent.putExtra(CalendarContract.Events.HAS_ALARM, 1);

                            intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
                            //deletestart
                          // ContentResolver cr = ctx.getContentResolver();
                          //  Uri deleteUri = null;
                          //  deleteUri = ContentUris.withAppendedId(eventsUri, eventID);
                          //  int rows = ctx.getContentResolver().delete(deleteUri, null, null);
                            //deleteend
                            ctx.startActivity(intent);
                            //deletestart
                           // Uri eventsUri = Uri.parse("content://calendar/events");
                            //Uri eventUri = ContentUris.withAppendedId(eventsUri, eventID);
                            //ctx.getContentResolver().delete(eventUri, null, null);

                            //Log.i(DEBUG_TAG, "Deleted " + iNumRowsDeleted + " calendar entry.");
                            //deleteend
                        }
                    });
            AlertDialog alert = builder.create();
            alert.show();

        }
        else if(result.matches("Duplicate"))
        {
            Toast.makeText(ctx, "Entry already exist!!!", Toast.LENGTH_LONG).show();
        }
        else if(result.matches("limitexceed"))
        {
            Toast.makeText(ctx, "No slots available!!!", Toast.LENGTH_LONG).show();
        }
        else if(result.matches("false"))
        {
            Toast.makeText(ctx, "Something wrong!!!", Toast.LENGTH_LONG).show();

        }
        else if(result.matches("false_can"))
        {
            Toast.makeText(ctx, "Sorry,No Such Appointment!!!", Toast.LENGTH_LONG).show();
        }
        else if(result.matches("true_can"))
        {

            Toast.makeText(ctx, "Appointment Successfully Cancelled!!!", Toast.LENGTH_LONG).show();

            Intent i = new Intent(ctx, after_plogin.class);
            i.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
            ctx.startActivity(i);
        }
        else{
            Toast.makeText(ctx, result, Toast.LENGTH_LONG).show();
        }
    }
}