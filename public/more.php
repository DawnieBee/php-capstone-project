<?php
/*
 * ********************* * 
 * Dawn Baker            *
 * Intro PHP             *
 * Assignment 1          *
 * for Steve George      *
 * ********************* *
 */
$title = "Community Services";

require __DIR__ . '/../includes/header.inc.php';

?> 
    <style>

      /*  main content  */
      
      section{
        min-height: 450px;
      }
      h2, h3, p{
        padding: 20px;
        margin: 0 auto;
      }
      /*   styles for the table  */


    </style>

      <section>
        <h2>Community Services</h2>
        <p>
          On this page you can find information on community events, city services, 
          community centers and schools.  The table below showcases the city services available 
          such as police stations, fire stations, community centers, and schools.  
        </p>
        <div id="table_container">
          <table class="areas">
            <caption>Winnipeg Neighborhood Services</caption>

            <tr><!--table headercells -->
              <th>Services</th>
              <th>Police Stations</th>
              <th>Fire Stations</th>
              <th>Community Centers</th>
              <th>Schools</th>
            </tr>
            <tr><!--row 2-->
              <th>St James</th>
              <td>4</td>
              <td>1</td>
              <td>5</td>
              <td>over 10</td>
            </tr>
            <tr><!-- row 3  -->
              <th>Elmwood</th>
              <td>0</td>
              <td>2</td>
              <td>3</td>
              <td>5</td>
            </tr>
            <tr><!-- row 4        -->
              <th>Downtown</th>
              <td>1</td>
              <td>1</td>
              <td>2</td>
              <td>4</td>
            </tr>
            <tr><!-- row 5      -->
              <th>Transcona</th>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>9</td>
            </tr>
            <tr><!-- row 6    -->
              <th>St Boniface</th>
              <td>0</td>
              <td>2</td>
              <td>3</td>
              <td>over 10</td>
            </tr>
          </table>
        </div>
        <br />
      <!--  this is the form field  -->
        <h2>Current residents</h2>
        <p>
          Fill in the form below to vote for your neighborhoods.  Please select 
          select from the following fields.  
        </p>
        <div id="form_container"  class="curved_borders">
          <h3>Current Residents - Vote on Your Neighborhood Here!</h3>
          <form id="vote_form"
              name="vote_form"
              method="post"
              action="http://www.scott-media.com/test/form_display.php"
              autocomplete="on">
            <fieldset>
              <legend>Vote!</legend>
              <p>
                <label for="comments">Neighborhood_Name</label><br />
                <textarea name="comments"
                          id="comments"
                          cols="50"
                          rows="2"
                          placeholder="type neighborhood name here"
                          ></textarea>
              </p>
              <p>
                Please select your age range:<br />
                <input type="radio" id="age18-30" name="age_range" value="18 - 30" />
                <label for="age18-30">18 to 30 years</label><br />

                <input type="radio" id="age31-55" name="age_range" value="31 - 55" />
                <label for="age31-55">31 to 55 years</label><br />

                <input type="radio" id="age56-70" name="age_range" value="56 - 70" />
                <label for="age56-70">56 t0 70 years</label><br />

                <input type="radio" id="age71-plus" name="age_range" value="71 plus" />
                <label for="age71-plus">71 years or older</label><br />
              </p>
              <p>
                Availability of Services (check all that apply)<br />
                <input type="checkbox" 
                       id="choice1" 
                       name="choice1" 
                       value="Grocery" />
                <label for="choice1">Grocery</label><br />        

                <input type="checkbox" 
                       id="choice2" 
                       name="choice2" 
                       value="Schools" />
                <label for="choice2">Schools</label><br />        

                <input type="checkbox" 
                       id="choice3" 
                       name="choice3" 
                       value="Library" />
                <label for="choice3">Library</label><br />              

                <input type="checkbox" 
                       id="choice4" 
                       name="choice4" 
                       value="Police" />
                <label for="choice4">Police</label><br />

                <input type="checkbox" 
                       id="choice5" 
                       name="choice5" 
                       value="Fire Station" />
                <label for="choice5">Fire Station</label><br />


                <input type="checkbox" 
                       id="choice6" 
                       name="choice6" 
                       value="Transit" />
                <label for="choice6">Transit</label><br />        

                <input type="checkbox" 
                       id="choice7" 
                       name="choice7" 
                       value="Community Center" />
                <label for="choice7">Community Center</label><br />

                <input type="checkbox" 
                       id="choice8" 
                       name="choice8" 
                       value="Community Pool" />
                <label for="choice8">Community Pool</label><br />
              </p>

            </fieldset>
              <p class="submit_buttons">
                <input type="submit" value="Send Form Please" />&nbsp;
                <input type="reset" value="Clear Form" accesskey="c" 
                       title="Use accesskey c" />
              </p>
          </form>
          <p><a href="#">Back to Top</a></p>
        </div>
        
      <!-- this is the community events portion-->
        <div id="events_container" class="clearfix curved_borders ">
          <h2>Community Events</h2>
          <p>This section will include all events happening in the neighborhoods
            we have information on.  Stay tuned for more info, coming soon!
          </p>
          <h2>More Information</h2>
          <p>Community schools are listed by elementary, junior high, and high school grades.
            French Immersion schools will have bussing service for elementary grade children 
            who live in the catchment area but are too far away to walk.  Junior high and high
            school stuents are expected to take Winnipeg Transit.</p>
          <p><a href="#">Back to Top</a></p>
        </div>
        
      </section>
<?php

require __DIR__ . '/../includes/footer.inc.php'

?>