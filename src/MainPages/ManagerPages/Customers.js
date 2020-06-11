import React, { Component } from 'react';
import axios from 'axios';
import './CommonStyle.css';
import { connect } from 'react-redux';



var Resp=[];

class Customers extends Component {
  state={
    Customer:null,
    Gender:null,
    Mobile:null,
    Email:null,
    Address:null,
    Customers:[],
    User_Id:this.props.User_Id,
    isopened:false,

}
onAddHandle=(e)=>{
     this.setState({
        [e.target.id]:e.target.value,

    })
}
onSubmit=(e)=>{
  //  e.preventDefault();
    axios.post('http://localhost/backend-mall-management/ManagerPage/Customer/Customer.php',this.state)
    .then(res => console.log(res.data));

    this.setState({
        Customer:'',
        Gender:'',
        Mobile:'',
        Email:'',
        Address:''
    })

    
}

setInputBox(i){
 var Customer=document.getElementById('Customer');
 var Gender=document.getElementById('Gender');
 var Mobile=document.getElementById('Mobile');
 var Email=document.getElementById('Email');
 var Address=document.getElementById('Address');
 var Customer_Id=document.getElementById('Customer_Id');

  Customer.value=i.Customer;
  Gender.value=i.Gender;
  Mobile.value=i.Mobile;
  Email.value=i.Email;
  Address.value=i.Address;
  Customer_Id.value=i.Customer_Id;

}

onDelete=(e)=>{
  //  e.preventDefault();
  var Customer_Id=document.getElementById('Customer_Id');
  var Customer1=Customer_Id.value
  axios.get('http://localhost/backend-mall-management/ManagerPage/Customer/DeleteCustomer.php?Customer1='+Customer1)
  .then(result=>console.log(result))
  .catch(function(error){
    console.log(error);
  })
  this.setState({
    Customer:'',
    Gender:'',
    Mobile:'',
    Email:'',
    Address:''
})
}

onUpdate=(e)=>{
  // e.preventDefault();
 var Customer=document.getElementById('Customer');
 var Gender=document.getElementById('Gender');
 var Mobile=document.getElementById('Mobile');
 var Email=document.getElementById('Email');
 var Address=document.getElementById('Address');
 var Customer_Id=document.getElementById('Customer_Id');
  var Jform=
    {
      Customer:Customer.value,
      Gender:Gender.value,
      Mobile:Mobile.value,
      Email:Email.value,
      Address:Address.value,
      Customer_Id:Customer_Id.value
    };
    axios.post('http://localhost/backend-mall-management/ManagerPage/Customer/UpdateCustomer.php',Jform)
    .then(res => console.log(res.data));

}


componentDidMount=()=>{

  this.setState({isopened:true});

  
}


componentDidUpdate(){
let myArray=[];
  axios.get('http://localhost/backend-mall-management/ManagerPage/Customer/CustomerList.php?User_Id='+this.state.User_Id)
  .then(response=>{
    
     Resp=response.data;
  for(let i=0;i<Resp.length;i+=1){
    myArray.push(<tr key={i} onClick={()=> this.setInputBox(Resp[i]) }>
      <td>{Resp[i].Customer_Id}</td>
      <td >{Resp[i].Customer}</td>
      <td>{Resp[i].Gender}</td>
      <td>{Resp[i].Mobile}</td>
      <td>{Resp[i].Email}</td>
      <td>{Resp[i].Address}</td>
    </tr>)
  
  }

  this.setState({Customers:myArray});
  })
  .catch(function(error){
    console.log(error);
  })
}
    render(){
      return (
        <div className="container">
            <div className="subcontainer1">
                <form>
                     <div className="row">
              <div className="col-25">
                <label htmlFor="Customer">Name:</label>
              </div>
              <div className="col-75">
                <input type="text" id="Customer" name="CustomerName" placeholder="Customer" onChange={this.onAddHandle} value={this.state.Customer}/>
              </div>
            </div>
            <div className="row">
              <div className="col-25">
                <label htmlFor="Gender">Gender:</label>
              </div>
              <div className="col-75">
                <input list='gender' type="text" id="Gender" name="Gender" placeholder="Gender" onChange={this.onAddHandle} value={this.state.Gender}/>
                <datalist id='gender'>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Others</option>
                </datalist>
              </div>
            </div>
            <div className="row">
              <div className="col-25">
                <label htmlFor="Mobile">Mobile Number:</label>
              </div>
              <div className="col-75">
                <input type="text" id="Mobile" name="MobNum" placeholder="Mobile Num.." onChange={this.onAddHandle} value={this.state.Mobile}/>
              </div>
            </div>
            <div className="row">
              <div className="col-25">
                <label htmlFor="Email">Email:</label>
              </div>
              <div className="col-75">
                <input type="email" id="Email" name="Email" placeholder="ex: john@xyzmail.com" onChange={this.onAddHandle} value={this.state.Email}/>
              </div>
            </div>
            <div className="row">
              <div className="col-25">
                <label htmlFor="Address">Address:</label>
              </div>
              <div className="col-75">
                <textarea id="Address" name="Address" placeholder="Address.." style={{height:150}} onChange={this.onAddHandle} value={this.state.Address}></textarea>
              </div>
            </div>
            <div className="row" style={{visibility:'hidden'}}>
              <div className="col-25" >
                <label htmlFor="Customer_Id">Customer_Id</label>
              </div>
              <div className="col-75">
             <input type='text' id="Customer_Id" name="Customer_Id" placeholder="AdCustomer_Id"  onChange={this.onAddHandle} value={this.state.Customer_Id}/>
              </div>
            </div>
            <br></br>
            <div className="actions">
              <div className="row">
                <input type="submit" value="Delete" onClick={this.onDelete}/>
              </div>
              <div className="row">
                <input type="submit" value="Update" onClick={this.onUpdate}/>
              </div>
              <div className="row">
                <input type="submit" value="Submit" onClick={this.onSubmit}/>
              </div>
            </div>
            </form>
            </div>
         
              <div className="subcontainer2">
                <table id="customers">
                <thead>
                    <th>Customer_Id</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Mobile Number</th>
                    <th>Shop Email</th>
                    <th>Address</th>
                  </thead>
                  <tbody>
                  {this.state.Customers}
                  </tbody>
        
                </table>
              </div>
            </div>

    
      )
    }
}

const mapStateToProps = (state) => {
  return{
  User_Id: state.storeId
  }
}

export default connect(mapStateToProps)(Customers);